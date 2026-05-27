<?php

namespace App\Filament\Widgets;

use App\Models\SparePart;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LowStockSparePartsWidget extends BaseWidget
{
    protected static ?int $sort = 7;
    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = '📦 قطع غيار تحتاج تعبئة';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                SparePart::query()
                    ->where('quantity', '<=', 5)
                    ->orderBy('quantity', 'asc')
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('اسم القطعة')
                    ->searchable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('part_number')
                    ->label('رقم القطعة')
                    ->copyable()
                    ->placeholder('—'),

                Tables\Columns\TextColumn::make('quantity')
                    ->label('الكمية المتبقية')
                    ->badge()
                    ->color(fn ($state) => match(true) {
                        $state <= 0 => 'danger',
                        $state <= 3 => 'warning',
                        default => 'success',
                    }),

                Tables\Columns\TextColumn::make('price')
                    ->label('سعر الوحدة')
                    ->money('USD'),

                Tables\Columns\TextColumn::make('stock_status')
                    ->label('الحالة')
                    ->badge()
                    ->getStateUsing(fn ($record) => match(true) {
                        $record->quantity <= 0 => '❌ نفد المخزون',
                        $record->quantity <= 3 => '⚠️ مخزون حرج',
                        default => '🔔 مخزون منخفض',
                    })
                    ->color(fn ($state) => match(true) {
                        str_contains($state, '❌') => 'danger',
                        str_contains($state, '⚠️') => 'warning',
                        default => 'info',
                    }),
            ])
            ->paginated(false)
            ->emptyStateHeading('جميع قطع الغيار متوفرة بكميات كافية 🎉')
            ->emptyStateIcon('heroicon-o-check-circle');
    }
}
