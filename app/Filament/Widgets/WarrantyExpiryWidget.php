<?php

namespace App\Filament\Widgets;

use App\Models\Asset;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Carbon\Carbon;

class WarrantyExpiryWidget extends BaseWidget
{
    protected static ?int $sort = 6;
    protected int | string | array $columnSpan = 'full';

    protected static ?string $heading = '⚠️ تنبيهات الضمان';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Asset::query()
                    ->whereNotNull('warranty_start_date')
                    ->whereNotNull('warranty_months')
                    ->whereRaw("DATE_ADD(warranty_start_date, INTERVAL warranty_months MONTH) <= DATE_ADD(NOW(), INTERVAL 30 DAY)")
                    ->with(['department', 'vendor'])
                    ->latest()
                    ->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('الأصل')
                    ->searchable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('serial_number')
                    ->label('الرقم التسلسلي')
                    ->copyable(),

                Tables\Columns\TextColumn::make('department.name')
                    ->label('القسم')
                    ->badge(),

                Tables\Columns\TextColumn::make('vendor.name')
                    ->label('المورد')
                    ->default('—'),

                Tables\Columns\TextColumn::make('warranty_start_date')
                    ->label('بداية الضمان')
                    ->date('Y/m/d'),

                Tables\Columns\TextColumn::make('warranty_expiry_date')
                    ->label('انتهاء الضمان')
                    ->getStateUsing(fn ($record) => $record->warranty_expiry_date)
                    ->date('Y/m/d'),

                Tables\Columns\TextColumn::make('warranty_status')
                    ->label('الحالة')
                    ->badge()
                    ->getStateUsing(function ($record) {
                        $days = $record->warranty_days_remaining;
                        if ($days === null) return 'غير محدد';
                        if ($days < 0) return '❌ منتهي';
                        if ($days <= 7) return '🔴 أقل من أسبوع';
                        if ($days <= 30) return '🟡 أقل من شهر';
                        return '🟢 ساري';
                    })
                    ->color(fn ($state) => match(true) {
                        str_contains($state, '❌') || str_contains($state, '🔴') => 'danger',
                        str_contains($state, '🟡') => 'warning',
                        default => 'success',
                    }),
            ])
            ->paginated(false)
            ->emptyStateHeading('لا توجد ضمانات قريبة من الانتهاء 🎉')
            ->emptyStateIcon('heroicon-o-check-circle');
    }
}
