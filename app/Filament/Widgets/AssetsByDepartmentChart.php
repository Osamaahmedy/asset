<?php
// ═══════════════════════════════════════════════════════════════
// 1. AssetsByDepartmentChart.php — دائرة: توزيع الأصول حسب الأقسام
// ═══════════════════════════════════════════════════════════════

namespace App\Filament\Widgets;

use App\Models\Asset;
use Filament\Widgets\ChartWidget;

class AssetsByDepartmentChart extends ChartWidget
{
    protected static ?string $heading = 'توزيع الأصول حسب الأقسام';
    protected static ?int $sort = 2;
    protected int|string|array $columnSpan = 'half';

   // public static function canView(): bool
   // {
    //    return auth()->user()?->can('عرض إحصائيات الأصول') ?? false;
    //}

    protected function getData(): array
    {
        $userDepartmentIds = auth()->user()
            ->departments()->pluck('departments.id')->toArray();

        $data = Asset::with('department')
            ->whereIn('department_id', $userDepartmentIds)
            ->get()
            ->groupBy(fn($a) => $a->department?->name ?? 'غير محدد')
            ->map->count();

        $colors = [
            '#6366f1','#0ea5e9','#10b981','#f59e0b',
            '#ef4444','#8b5cf6','#ec4899','#14b8a6',
        ];

        return [
            'datasets' => [[
                'data'                 => $data->values()->toArray(),
                'backgroundColor'      => array_slice($colors, 0, $data->count()),
                'borderColor'          => '#ffffff',
                'borderWidth'          => 3,
                'hoverOffset'          => 10,
            ]],
            'labels' => $data->keys()->toArray(),
        ];
    }

    protected function getType(): string { return 'doughnut'; }

    protected function getOptions(): ?array
    {
        return [
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                    'labels'   => ['font' => ['size' => 13], 'padding' => 16],
                ],
                'tooltip' => [
                    'callbacks' => new \stdClass(), // يظهر القيمة تلقائياً
                ],
            ],
            'cutout'   => '65%',
            'animation'=> ['animateRotate' => true, 'duration' => 800],
        ];
    }
}
