<?php

namespace App\Filament\Widgets;

use App\Models\Asset;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class AssetStatusChart extends ChartWidget
{
    protected static ?int $sort = 1;
    protected int|string|array $columnSpan = 'full';

    public function getHeading(): ?string
    {
        return __('messages.widget.maintenance_status_overview');
    }

    protected function getData(): array
    {
        $isAr = app()->getLocale() === 'ar';

        $goodLabel = $isAr ? '✅ جيدة' : '✅ Good';
        $twoMonthsLabel = $isAr ? '🔔 أقل من شهرين' : '🔔 < 2 Months';
        $oneMonthLabel = $isAr ? '⚠️ أقل من شهر' : '⚠️ < 1 Month';
        $oneWeekLabel = $isAr ? '⚠️ أقل من أسبوع' : '⚠️ < 1 Week';
        $overdueLabel = $isAr ? '❌ متأخرة' : '❌ Overdue';
        $unknownLabel = $isAr ? '❓ غير معروف' : '❓ Unknown';

        $statusLabels = [
            $goodLabel      => '#16a34a',
            $twoMonthsLabel => '#84cc16',
            $oneMonthLabel  => '#facc15',
            $oneWeekLabel   => '#f97316',
            $overdueLabel   => '#ef4444',
            $unknownLabel   => '#9ca3af',
        ];

        // ── فلتر حسب أقسام المستخدم ──────────────────────────────────────────
        $userDepartmentIds = auth()->user()
            ->departments()
            ->pluck('departments.id')
            ->toArray();

        $assetsQuery = Asset::with('department');

        if (!empty($userDepartmentIds)) {
            $assetsQuery->whereIn('department_id', $userDepartmentIds);
        }

        $statusCounts     = array_fill_keys(array_keys($statusLabels), 0);
        $departmentCounts = [];
        $monthlyCounts    = array_fill(1, 12, 0);

        foreach ($assetsQuery->get() as $asset) {
            $status = match ($asset->maintenance_status) {
                '✅ Good'        => $goodLabel,
                '🔔 < 2 Months' => $twoMonthsLabel,
                '⚠️ < 1 Month'  => $oneMonthLabel,
                '⚠️ < 1 Week'   => $oneWeekLabel,
                '❌ Overdue'     => $overdueLabel,
                default          => $asset->maintenance_status ?? $unknownLabel,
            };

            if (isset($statusCounts[$status])) {
                $statusCounts[$status]++;
            } else {
                $statusCounts[$unknownLabel]++;
            }

            $department = $asset->department?->name ?? ($isAr ? 'غير محدد' : 'Unassigned');
            $departmentCounts[$department] = ($departmentCounts[$department] ?? 0) + 1;

            if ($asset->last_maintenance_date) {
                $month = Carbon::parse($asset->last_maintenance_date)->month;
                $monthlyCounts[$month]++;
            }
        }

        $monthLabels = array_map(
            fn($m) => Carbon::create()->month($m)->locale(app()->getLocale())->translatedFormat('F'),
            range(1, 12)
        );

        return [
            'datasets' => [
                [
                    'label'           => __('messages.widget.by_status'),
                    'data'            => array_values($statusCounts),
                    'backgroundColor' => array_values($statusLabels),
                    'borderRadius'    => 8,
                    'barThickness'    => 30,
                    'yAxisID'         => 'y1',
                ],
                [
                    'label'           => __('messages.widget.by_department'),
                    'data'            => array_values($departmentCounts),
                    'backgroundColor' => '#0ea5e9',
                    'type'            => 'bar',
                    'borderRadius'    => 8,
                    'barThickness'    => 20,
                    'yAxisID'         => 'y2',
                ],
                [
                    'label'              => __('messages.widget.monthly_view'),
                    'data'               => array_values($monthlyCounts),
                    'type'               => 'line',
                    'stepped'            => true,
                    'borderColor'        => '#8b5cf6',
                    'backgroundColor'    => 'rgba(139,92,246,0.08)',
                    'borderWidth'        => 2.5,
                    'pointRadius'        => 4,
                    'pointBackgroundColor' => '#8b5cf6',
                    'fill'               => true,
                    'yAxisID'            => 'y3',
                ],
            ],
            'labels' => [
                ...array_keys($statusCounts),
                ...array_keys($departmentCounts),
                ...$monthLabels,
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): ?array
    {
        return [
            'responsive'          => true,
            'maintainAspectRatio' => false,
            'plugins'             => [
                'tooltip' => [
                    'enabled'        => true,
                    'usePointStyle'  => true,
                    'bodyFont'       => ['size' => 13],
                    'titleFont'      => ['size' => 14],
                ],
                'legend' => [
                    'position' => 'top',
                    'labels'   => [
                        'font'  => ['size' => 14],
                        'color' => '#111827',
                    ],
                ],
                'title' => [
                    'display' => true,
                    'text'    => __('messages.widget.maintenance_report'),
                    'font'    => ['size' => 18, 'weight' => 'bold'],
                    'color'   => '#111827',
                ],
            ],
            'scales' => [
                'y1' => [
                    'beginAtZero' => true,
                    'position'    => 'left',
                    'grid'        => ['drawOnChartArea' => true],
                    'title'       => [
                        'display' => true,
                        'text'    => __('messages.widget.assets_count_by_status'),
                        'font'    => ['size' => 13],
                    ],
                ],
                'y2' => [
                    'beginAtZero' => true,
                    'position'    => 'right',
                    'grid'        => ['drawOnChartArea' => false],
                    'title'       => [
                        'display' => true,
                        'text'    => __('messages.widget.assets_count_by_department'),
                        'font'    => ['size' => 13],
                    ],
                ],
                'y3' => [
                    'beginAtZero' => true,
                    'display'     => false,
                ],
            ],
        ];
    }
}
