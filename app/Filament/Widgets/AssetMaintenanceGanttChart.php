<?php
// ═══════════════════════════════════════════════════════════════
// 4. AssetMaintenanceGanttChart.php — جانت: جدول صيانة الأصول
// ═══════════════════════════════════════════════════════════════

namespace App\Filament\Widgets;

use App\Models\Asset;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class AssetMaintenanceGanttChart extends ChartWidget
{
    protected static ?string $heading = 'جدول صيانة الأصول (الأشهر الستة القادمة)';
    protected static ?int $sort = 5;
    protected int|string|array $columnSpan = 'full';

   // public static function canView(): bool
    //{
   //     return auth()->user()?->can('عرض جدول الصيانة') ?? false;
   // }

    protected function getData(): array
    {
        $userDepartmentIds = auth()->user()
            ->departments()->pluck('departments.id')->toArray();

        $assets = Asset::with('department')
            ->whereIn('department_id', $userDepartmentIds)
            ->whereNotNull('maintenance_due_date')
            ->orderBy('maintenance_due_date')
            ->take(15)
            ->get();

        $today     = Carbon::today();
        $endPeriod = $today->copy()->addMonths(6);

        // Labels = أسماء الأصول
        $labels = $assets->map(fn($a) => $a->name . ' — ' . ($a->department?->name ?? ''))
            ->toArray();

        // كل أصل يمثله شريط من تاريخ اليوم حتى تاريخ الصيانة
        $data = $assets->map(function ($asset) use ($today, $endPeriod) {
            $due  = Carbon::parse($asset->maintenance_due_date);
            $days = max(1, $today->diffInDays($due, false));

            // لون حسب الحالة
            $color = match (true) {
                $due->isPast()                    => '#ef4444', // متأخر
                $due->diffInDays($today) <= 7     => '#f97316', // أسبوع
                $due->diffInDays($today) <= 30    => '#facc15', // شهر
                $due->diffInDays($today) <= 60    => '#84cc16', // شهرين
                default                           => '#10b981', // جيد
            };

            return [
                'x'                => [$today->format('Y-m-d'), $due->format('Y-m-d')],
                'backgroundColor'  => $color,
                'borderColor'      => $color,
                'borderWidth'      => 1,
                'borderSkipped'    => false,
                'borderRadius'     => 6,
            ];
        })->toArray();

        return [
            'datasets' => [[
                'label' => 'الفترة حتى الصيانة',
                'data'  => $data,
            ]],
            'labels' => $labels,
        ];
    }

    protected function getType(): string { return 'bar'; }

    protected function getOptions(): ?array
    {
        return [
            'indexAxis'           => 'y',   // ← هذا يجعله أفقياً كالجانت
            'responsive'          => true,
            'maintainAspectRatio' => false,
            'plugins'             => [
                'legend'  => ['display' => false],
                'tooltip' => [
                    'enabled'   => true,
                    'callbacks' => [
                        'label' => 'function(ctx){ const d=ctx.raw.x; return " من: "+d[0]+" → إلى: "+d[1]; }',
                    ],
                ],
            ],
            'scales' => [
                'x' => [
                    'type'  => 'time',
                    'time'  => [
                        'unit'         => 'month',
                        'tooltipFormat'=> 'yyyy/MM/dd',
                        'displayFormats'=> ['month' => 'MMM yyyy'],
                    ],
                    'min'   => Carbon::today()->format('Y-m-d'),
                    'max'   => Carbon::today()->addMonths(6)->format('Y-m-d'),
                    'title' => ['display' => true, 'text' => 'التاريخ'],
                    'grid'  => ['color' => 'rgba(0,0,0,0.06)'],
                ],
                'y' => [
                    'grid' => ['display' => false],
                ],
            ],
        ];
    }
}
