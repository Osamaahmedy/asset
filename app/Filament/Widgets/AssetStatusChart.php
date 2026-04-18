<?php

namespace App\Filament\Widgets;

use App\Models\Asset;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class AssetStatusChart extends ChartWidget
{
    protected static ?string $heading = 'نظرة عامة على الصيانة حسب الحالة والقسم والشهر';
    protected static ?int $sort = 1;
    protected int|string|array $columnSpan = 'full';

    // ── صلاحية العرض ─────────────────────────────────────────────────────────
    ////public static function canView(): bool
    //{
     //   return auth()->user()?->can('عرض إحصائيات الصيانة') ?? false;
    //}

    protected function getData(): array
    {
        $statusLabels = [
            '✅ جيدة'            => '#16a34a',
            '🔔 أقل من شهرين'   => '#84cc16',
            '⚠️ أقل من شهر'    => '#facc15',
            '⚠️ أقل من أسبوع'  => '#f97316',
            '❌ متأخرة'          => '#ef4444',
            '❓ غير معروف'       => '#9ca3af',
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
                '✅ Good'        => '✅ جيدة',
                '🔔 < 2 Months' => '🔔 أقل من شهرين',
                '⚠️ < 1 Month'  => '⚠️ أقل من شهر',
                '⚠️ < 1 Week'   => '⚠️ أقل من أسبوع',
                '❌ Overdue'     => '❌ متأخرة',
                default          => $asset->maintenance_status
                    ?? '❓ غير معروف',
            };

            if (isset($statusCounts[$status])) {
                $statusCounts[$status]++;
            } else {
                $statusCounts['❓ غير معروف']++;
            }

            $department = $asset->department?->name ?? 'غير محدد';
            $departmentCounts[$department] = ($departmentCounts[$department] ?? 0) + 1;

            if ($asset->last_maintenance_date) {
                $month = Carbon::parse($asset->last_maintenance_date)->month;
                $monthlyCounts[$month]++;
            }
        }

        $monthLabels = array_map(
            fn($m) => Carbon::create()->month($m)->locale('ar')->translatedFormat('F'),
            range(1, 12)
        );

        return [
            'datasets' => [
                [
                    'label'           => 'حسب الحالة',
                    'data'            => array_values($statusCounts),
                    'backgroundColor' => array_values($statusLabels),
                    'borderRadius'    => 8,
                    'barThickness'    => 30,
                    'yAxisID'         => 'y1',
                ],
                [
                    'label'           => 'حسب القسم',
                    'data'            => array_values($departmentCounts),
                    'backgroundColor' => '#0ea5e9',
                    'type'            => 'bar',
                    'borderRadius'    => 8,
                    'barThickness'    => 20,
                    'yAxisID'         => 'y2',
                ],
                [
                    'label'              => 'النظرة الشهرية',
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
                    'text'    => 'تقرير الصيانة (بيانات مباشرة)',
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
                        'text'    => 'عدد الأصول حسب الحالة',
                        'font'    => ['size' => 13],
                    ],
                ],
                'y2' => [
                    'beginAtZero' => true,
                    'position'    => 'right',
                    'grid'        => ['drawOnChartArea' => false],
                    'title'       => [
                        'display' => true,
                        'text'    => 'عدد الأصول حسب القسم',
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
