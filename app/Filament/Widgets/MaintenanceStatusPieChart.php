<?php
// ═══════════════════════════════════════════════════════════════
// 2. MaintenanceStatusPieChart.php — دائرة: حالات الصيانة
// ═══════════════════════════════════════════════════════════════

namespace App\Filament\Widgets;

use App\Models\Asset;
use Filament\Widgets\ChartWidget;

class MaintenanceStatusPieChart extends ChartWidget
{
    protected static ?string $heading = 'توزيع حالات الصيانة';
    protected static ?int $sort = 3;
    protected int|string|array $columnSpan = 'half';

    //public static function canView(): bool
   // {
   //     return auth()->user()?->can('عرض إحصائيات الصيانة') ?? false;
   // }

    protected function getData(): array
    {
        $userDepartmentIds = auth()->user()
            ->departments()->pluck('departments.id')->toArray();

        $assets = Asset::whereIn('department_id', $userDepartmentIds)->get();

        $statusMap = [
            '✅ Good'        => ['label' => 'جيدة ✅',            'color' => '#16a34a'],
            '🔔 < 2 Months' => ['label' => 'أقل من شهرين 🔔',   'color' => '#84cc16'],
            '⚠️ < 1 Month'  => ['label' => 'أقل من شهر ⚠️',    'color' => '#facc15'],
            '⚠️ < 1 Week'   => ['label' => 'أقل من أسبوع ⚠️',  'color' => '#f97316'],
            '❌ Overdue'     => ['label' => 'متأخرة ❌',          'color' => '#ef4444'],
        ];

        $counts = array_fill_keys(array_keys($statusMap), 0);

        foreach ($assets as $asset) {
            if (isset($counts[$asset->maintenance_status])) {
                $counts[$asset->maintenance_status]++;
            }
        }

        // أزل الحالات الفارغة
        $counts = array_filter($counts);

        return [
            'datasets' => [[
                'data'            => array_values($counts),
                'backgroundColor' => array_map(fn($k) => $statusMap[$k]['color'], array_keys($counts)),
                'borderColor'     => '#fff',
                'borderWidth'     => 3,
                'hoverOffset'     => 12,
            ]],
            'labels' => array_map(fn($k) => $statusMap[$k]['label'], array_keys($counts)),
        ];
    }

    protected function getType(): string { return 'pie'; }

    protected function getOptions(): ?array
    {
        return [
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                    'labels'   => ['font' => ['size' => 13], 'padding' => 14],
                ],
            ],
            'animation' => ['animateRotate' => true, 'duration' => 900],
        ];
    }
}
