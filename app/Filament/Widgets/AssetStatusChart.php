<?php

namespace App\Filament\Widgets;

use App\Models\Asset;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class AssetStatusChart extends ChartWidget
{
    protected static ?string $heading = '📊 Maintenance Overview by Status, Department, and Month';
    protected static ?int $sort = 1;
    protected int|string|array $columnSpan = 'full';

    protected function getData(): array
    {
        // Labels and colors for status
        $statusLabels = [
            '✅ Good' => '#16a34a',
            '🔔 < 2 Months' => '#84cc16',
            '⚠️ < 1 Month' => '#facc15',
            '⚠️ < 1 Week' => '#f97316',
            '❌ Overdue' => '#ef4444',
            '❓ Unknown' => '#9ca3af',
        ];

        $statusCounts = array_fill_keys(array_keys($statusLabels), 0);
        $departmentCounts = [];
        $monthlyCounts = array_fill(1, 12, 0);

        foreach (Asset::with('department')->get() as $asset) {
            // Map Arabic status to English
            $status = match ($asset->maintenance_status) {
                '✅ جيدة' => '✅ Good',
                '🔔 أقل من شهرين' => '🔔 < 2 Months',
                '⚠️ أقل من شهر' => '⚠️ < 1 Month',
                '⚠️ أقل من أسبوع' => '⚠️ < 1 Week',
                '❌ متأخرة' => '❌ Overdue',
                default => '❓ Unknown',
            };

            $statusCounts[$status]++;

            // Department count
            $department = $asset->department?->name ?? 'Undefined';
            $departmentCounts[$department] = ($departmentCounts[$department] ?? 0) + 1;

            // Monthly count
            if ($asset->last_maintenance_date) {
                $month = Carbon::parse($asset->last_maintenance_date)->month;
                $monthlyCounts[$month]++;
            }
        }

        return [
            'datasets' => [
                // Status bar
                [
                    'label' => 'By Status',
                    'data' => array_values($statusCounts),
                    'backgroundColor' => array_values($statusLabels),
                    'borderRadius' => 8,
                    'barThickness' => 30,
                    'yAxisID' => 'y1',
                ],
                // Department bar
                [
                    'label' => 'By Department',
                    'data' => array_values($departmentCounts),
                    'backgroundColor' => '#0ea5e9',
                    'type' => 'bar',
                    'borderRadius' => 8,
                    'barThickness' => 20,
                    'yAxisID' => 'y2',
                ],
                // Monthly stepped line
                [
                    'label' => 'Monthly Overview',
                    'data' => array_values($monthlyCounts),
                    'type' => 'line',
                    'stepped' => true,
                    'borderColor' => '#8b5cf6',
                    'backgroundColor' => 'transparent',
                    'borderWidth' => 2.5,
                    'pointRadius' => 4,
                    'pointBackgroundColor' => '#8b5cf6',
                    'fill' => false,
                    'yAxisID' => 'y3',
                ],
            ],
            'labels' => [
                ...array_keys($statusCounts), // Labels for statuses
                ...array_keys($departmentCounts), // Labels for departments
                ...array_map(fn($m) => Carbon::create()->month($m)->format('F'), range(1, 12)), // Labels for months
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
            'responsive' => true,
            'maintainAspectRatio' => false,
            'plugins' => [
                'tooltip' => [
                    'enabled' => true,
                    'usePointStyle' => true,
                    'bodyFont' => ['size' => 13],
                    'titleFont' => ['size' => 14],
                ],
                'legend' => [
                    'position' => 'top',
                    'labels' => [
                        'font' => ['size' => 14],
                        'color' => '#111827',
                    ],
                ],
                'title' => [
                    'display' => true,
                    'text' => '📈 Maintenance Report (Live Data)',
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
                    'grid' => ['drawOnChartArea' => true],
                    'title' => [
                        'display' => true,
                        'text' => 'Status Count',
                        'font' => ['size' => 14],
                    ],
                ],
                'y2' => [
                    'beginAtZero' => true,
                    'position' => 'right',
                    'grid' => ['drawOnChartArea' => false],
                    'title' => [
                        'display' => true,
                        'text' => 'Department Count',
                        'font' => ['size' => 14],
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
