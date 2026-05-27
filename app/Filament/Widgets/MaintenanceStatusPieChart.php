<?php
// ═══════════════════════════════════════════════════════════════
// 2. MaintenanceStatusPieChart.php — دائرة: حالات الصيانة
// ═══════════════════════════════════════════════════════════════

namespace App\Filament\Widgets;

use App\Models\Asset;
use Filament\Widgets\ChartWidget;

class MaintenanceStatusPieChart extends ChartWidget
{
    protected static ?int $sort = 3;
    protected int|string|array $columnSpan = 'half';

    public function getHeading(): ?string
    {
        return __('messages.widget.maintenance_status_distribution');
    }

    //public static function canView(): bool
   // {
   //     return auth()->user()?->can('عرض إحصائيات الصيانة') ?? false;
   // }

    protected function getData(): array
    {
        $userDepartmentIds = auth()->user()
            ->departments()->pluck('departments.id')->toArray();

        $assets = Asset::whereIn('department_id', $userDepartmentIds)->get();

        $isAr = app()->getLocale() === 'ar';
        $statusMap = [
            '✅ Good'                  => ['label' => $isAr ? 'جيدة ✅' : 'Good ✅',                     'color' => '#16a34a'],
            '🔔 Less than two months' => ['label' => $isAr ? 'أقل من شهرين 🔔' : 'Less than 2 months 🔔',  'color' => '#84cc16'],
            '⚠️ Less than a month'    => ['label' => $isAr ? 'أقل من شهر ⚠️' : 'Less than a month ⚠️',   'color' => '#facc15'],
            '⚠️ Less than a week'     => ['label' => $isAr ? 'أقل من أسبوع ⚠️' : 'Less than a week ⚠️', 'color' => '#f97316'],
            '❌ Overdue'               => ['label' => $isAr ? 'متأخرة ❌' : 'Overdue ❌',                   'color' => '#ef4444'],
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
