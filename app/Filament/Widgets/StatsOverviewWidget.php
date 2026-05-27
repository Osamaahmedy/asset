<?php

namespace App\Filament\Widgets;

use App\Models\Asset;
use App\Models\Department;
use App\Models\Employee;
use App\Models\MaintenanceRequest;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Cache;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        $user = auth()->user();
        $deptIds = $user?->departments()->pluck('departments.id')->toArray() ?? [];
        $cacheKey = 'stats_widget_' . implode('_', $deptIds);

        return Cache::remember($cacheKey, 300, function () use ($deptIds) {
            $assetQuery = Asset::query();
            if (!empty($deptIds)) {
                $assetQuery->whereIn('department_id', $deptIds);
            }

            $totalAssets = (clone $assetQuery)->count();
            $damagedAssets = (clone $assetQuery)->where('status', Asset::STATUS_DAMAGED)->count();
            $maintenanceAssets = (clone $assetQuery)->where('status', Asset::STATUS_MAINTENANCE)->count();
            $inUseAssets = (clone $assetQuery)->where('status', Asset::STATUS_IN_USE)->count();
            $availableAssets = (clone $assetQuery)->where('status', Asset::STATUS_AVAILABLE)->count();

            $pendingRequests = MaintenanceRequest::when(!empty($deptIds), function ($q) use ($deptIds) {
                $q->whereHas('asset', fn($q2) => $q2->whereIn('department_id', $deptIds));
            })->where('status', 'pending')->count();

            $totalDepartments = Department::when(!empty($deptIds), fn($q) => $q->whereIn('id', $deptIds))->count();
            $totalEmployees = Employee::when(!empty($deptIds), fn($q) => $q->whereIn('department_id', $deptIds))->count();

            return [
                Stat::make(__('messages.widget.total_assets'), $totalAssets)
                    ->description(
                        __('messages.asset_status.available') . ": $availableAssets | " .
                        __('messages.asset_status.in_use') . ": $inUseAssets"
                    )
                    ->descriptionIcon('heroicon-m-cube')
                    ->chart([7, 2, 10, 3, 15, 4, 17])
                    ->color('success'),

                Stat::make(__('messages.widget.broken_maintenance'), $damagedAssets + $maintenanceAssets)
                    ->description(__('messages.status.damaged') . ": $damagedAssets | " . __('messages.status.maintenance') . ": $maintenanceAssets")
                    ->descriptionIcon('heroicon-m-wrench-screwdriver')
                    ->chart([1, 4, 2, 8, 3, 9, 2])
                    ->color('danger'),

                Stat::make(__('messages.widget.departments_employees'), $totalDepartments)
                    ->description(__('messages.widget.total_employees') . ": $totalEmployees")
                    ->descriptionIcon('heroicon-m-user-group')
                    ->chart([2, 5, 8, 4, 10, 6, 12])
                    ->color('primary'),

                Stat::make('طلبات صيانة معلقة', $pendingRequests)
                    ->description('طلبات تحتاج مراجعة')
                    ->descriptionIcon('heroicon-m-clock')
                    ->chart([3, 7, 2, 5, 8, 4, 6])
                    ->color($pendingRequests > 0 ? 'warning' : 'success'),
            ];
        });
    }
}
