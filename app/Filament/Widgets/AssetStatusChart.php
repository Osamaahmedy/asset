<?php

namespace App\Filament\Widgets;

use App\Models\Asset;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class AssetStatusChart extends ChartWidget
{
    protected static ?string $heading = '📊 تقارير حالة الصيانة حسب الحالة والقسم والشهر';
    protected static ?int $sort = 1;
    protected int | string | array $columnSpan = 'full'; // يجعل الشارت كبير

    protected function getData(): array
    {
        // 1. توزيع حسب الحالة
        $statusCounts = [
            '✅ جيدة' => 0,
            '🔔 أقل من شهرين' => 0,
            '⚠️ أقل من شهر' => 0,
            '⚠️ أقل من أسبوع' => 0,
            '❌ متأخرة' => 0,
            '❓ غير معروف' => 0,
        ];

        // 2. توزيع حسب القسم
        $departmentCounts = [];

        // 3. توزيع شهري (يناير - ديسمبر)
        $monthlyCounts = array_fill(1, 12, 0); // [1 => 0, 2 => 0, ..., 12 => 0]

        foreach (Asset::with('department')->get() as $asset) {
            $status = $asset->maintenance_status;
            $statusCounts[$status] = ($statusCounts[$status] ?? 0) + 1;

            // القسم
            $dept = $asset->department?->name ?? 'غير محدد';
            $departmentCounts[$dept] = ($departmentCounts[$dept] ?? 0) + 1;

            // الشهر
            if ($asset->last_maintenance_date) {
                $month = Carbon::parse($asset->last_maintenance_date)->month;
                $monthlyCounts[$month]++;
            }
        }

        return [
            'datasets' => [
                [
                    'label' => 'الحالة',
                    'data' => array_values($statusCounts),
                    'backgroundColor' => ['#16a34a', '#84cc16', '#facc15', '#f97316', '#ef4444', '#9ca3af'],
                    'borderRadius' => 10,
                    'barThickness' => 30,
                    'yAxisID' => 'y1',
                ],
                [
                    'label' => 'حسب القسم',
                    'data' => array_values($departmentCounts),
                    'backgroundColor' => '#0ea5e9',
                    'type' => 'bar',
                    'yAxisID' => 'y2',
                ],
                [
                    'label' => 'شهرياً',
                    'data' => array_values($monthlyCounts),
                    'backgroundColor' => '#8b5cf6',
                    'type' => 'line',
                    'borderColor' => '#8b5cf6',
                    'borderWidth' => 3,
                    'fill' => false,
                    'tension' => 0.3,
                    'yAxisID' => 'y3',
                ],
            ],
            'labels' => [
                ...array_keys($statusCounts),
                ...array_keys($departmentCounts),
                ...array_map(fn($m) => Carbon::create()->month($m)->locale('ar')->translatedFormat('F'), range(1, 12))
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // يمكن تغييره إلى 'line' أو 'pie' لكن bar أكثر شمولًا
    }

    protected function getOptions(): ?array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'tooltip' => [
                    'enabled' => true,
                    'usePointStyle' => true,
                ],
                'legend' => [
                    'position' => 'top',
                    'labels' => [
                        'font' => ['size' => 14],
                    ],
                ],
                'title' => [
                    'display' => true,
                    'text' => '📈 تقارير الصيانة',
                    'font' => [
                        'size' => 18,
                        'weight' => 'bold',
                    ],
                ],
            ],
            'scales' => [
                'y1' => [
                    'beginAtZero' => true,
                    'position' => 'left',
                    'title' => [
                        'display' => true,
                        'text' => 'عدد حسب الحالة',
                    ],
                ],
                'y2' => [
                    'beginAtZero' => true,
                    'position' => 'right',
                    'grid' => ['drawOnChartArea' => false],
                    'title' => [
                        'display' => true,
                        'text' => 'حسب الأقسام',
                    ],
                ],
                'y3' => [
                    'beginAtZero' => true,
                    'display' => false,
                ],
            ],
        ];
    }
}
