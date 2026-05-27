<?php

namespace App\Filament\Widgets;

use App\Models\Asset;
use App\Models\Department;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        $totalAssets = Asset::count();
        $damagedAssets = Asset::where('status', \App\Models\Asset::STATUS_DAMAGED)->count();
        $maintenanceAssets = Asset::where('status', \App\Models\Asset::STATUS_MAINTENANCE)->count();
        
        $totalDepartments = Department::count();
        $totalEmployees = Employee::count();

        return [
            Stat::make(__('messages.widget.total_assets'), $totalAssets)
                ->description(__('messages.widget.total_assets_desc'))
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
        ];
    }
}
