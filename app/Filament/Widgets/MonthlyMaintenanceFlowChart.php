<?php
// ═══════════════════════════════════════════════════════════════
// 3. MonthlyMaintenanceFlowChart.php — فلو شارت: الصيانات الشهرية
// ═══════════════════════════════════════════════════════════════

namespace App\Filament\Widgets;

use App\Models\Maintenance;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class MonthlyMaintenanceFlowChart extends ChartWidget
{
    protected static ?int $sort = 4;
    protected int|string|array $columnSpan = 'full';

    public function getHeading(): ?string
    {
        return __('messages.widget.monthly_maintenance_flow');
    }

  //  public static function canView(): bool
    //{
       // return auth()->user()?->can('عرض إحصائيات الصيانة') ?? false;
   // }

    protected function getData(): array
    {
        $userDepartmentIds = auth()->user()
            ->departments()->pluck('departments.id')->toArray();

        $months  = collect(range(11, 0))->map(fn($i) => now()->subMonths($i));
        $labels  = $months->map(fn($m) => $m->locale(app()->getLocale())->translatedFormat('M Y'))->toArray();

        $isAr = app()->getLocale() === 'ar';
        $statuses = [
            'Maintenance Completed' => ['label' => $isAr ? 'اكتملت ✅' : 'Completed ✅',   'color' => '#10b981'],
            'Postponed'             => ['label' => $isAr ? 'مؤجلة ⏳' : 'Postponed ⏳',    'color' => '#f59e0b'],
            'Pending'               => ['label' => $isAr ? 'انتظار 🕐' : 'Pending 🕐',   'color' => '#ef4444'],
        ];

        $datasets = [];

        foreach ($statuses as $statusKey => $meta) {
            $data = $months->map(function ($month) use ($statusKey, $userDepartmentIds) {
                return Maintenance::whereHas('asset', fn($q) =>
                        $q->whereIn('department_id', $userDepartmentIds))
                    ->where('status', $statusKey)
                    ->whereYear('maintenance_date', $month->year)
                    ->whereMonth('maintenance_date', $month->month)
                    ->count();
            })->toArray();

            $datasets[] = [
                'label'           => $meta['label'],
                'data'            => $data,
                'borderColor'     => $meta['color'],
                'backgroundColor' => $meta['color'] . '22',
                'fill'            => true,
                'tension'         => 0.4,
                'borderWidth'     => 2.5,
                'pointRadius'     => 5,
                'pointHoverRadius'=> 8,
                'pointBackgroundColor' => $meta['color'],
            ];
        }

        return ['datasets' => $datasets, 'labels' => $labels];
    }

    protected function getType(): string { return 'line'; }

    protected function getOptions(): ?array
    {
        return [
            'responsive'          => true,
            'maintainAspectRatio' => false,
            'interaction'         => ['mode' => 'index', 'intersect' => false],
            'plugins'             => [
                'legend'  => ['position' => 'top', 'labels' => ['font' => ['size' => 13]]],
                'tooltip' => ['enabled' => true, 'usePointStyle' => true],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'grid'        => ['color' => 'rgba(0,0,0,0.06)'],
                    'title'       => ['display' => true, 'text' => __('messages.widget.maintenances_count')],
                ],
                'x' => [
                    'grid' => ['display' => false],
                ],
            ],
        ];
    }
}
