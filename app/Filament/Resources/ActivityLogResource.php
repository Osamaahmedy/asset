<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityLogResource\Pages;
use App\Models\ActivityLog;
use App\Models\Asset;
use App\Models\Maintenance;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ActivityLogResource extends Resource
{
    protected static ?string $model = ActivityLog::class;

    protected static ?string $navigationLabel = 'سجل الأنشطة';
    protected static ?string $pluralModelLabel = 'سجلات الأنشطة';
    protected static ?string $modelLabel = 'نشاط';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'التقارير والسجلات';
    protected static ?int $navigationSort = 1;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('model_name')
                    ->label('اسم الأصل / الصيانة')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->placeholder('— محذوف —')
                    ->description(fn(ActivityLog $record) => $record->department_name
                        ? 'القسم: ' . $record->department_name
                        : null),

                BadgeColumn::make('action')
                    ->label('نوع الإجراء')
                    ->sortable()
                    ->searchable()
                    ->colors([
                        'success' => fn($state) => in_array($state, ['created', 'إنشاء']),
                        'warning' => fn($state) => in_array($state, ['updated', 'تعديل']),
                        'danger'  => fn($state) => in_array($state, ['deleted', 'حذف']),
                        'info'    => fn($state) => in_array($state, ['maintenance', 'صيانة']),
                    ])
                    ->formatStateUsing(fn($state) => match ($state) {
                        'created'     => '✅ إنشاء',
                        'updated'     => '✏️ تعديل',
                        'deleted'     => '🗑️ حذف',
                        'maintenance' => '🔧 صيانة',
                        default       => $state,
                    }),

                BadgeColumn::make('model_type')
                    ->label('نوع العنصر')
                    ->sortable()
                    ->formatStateUsing(fn($state) => match (class_basename($state)) {
                        'Asset'       => '📦 أصل',
                        'Maintenance' => '🔧 صيانة',
                        default       => class_basename($state),
                    })
                    ->colors([
                        'primary' => fn($state) => class_basename($state) === 'Asset',
                        'warning' => fn($state) => class_basename($state) === 'Maintenance',
                    ]),

                TextColumn::make('description')
                    ->label('تفاصيل إضافية')
                    ->wrap()
                    ->searchable()
                    ->placeholder('—')
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإجراء')
                    ->dateTime('Y/m/d - h:i A')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('action')
                    ->label('نوع الإجراء')
                    ->options([
                        'created'     => 'إنشاء',
                        'updated'     => 'تعديل',
                        'deleted'     => 'حذف',
                        'maintenance' => 'صيانة',
                    ]),

                Tables\Filters\SelectFilter::make('model_type')
                    ->label('نوع العنصر')
                    ->options([
                        Asset::class       => 'أصل',
                        Maintenance::class => 'صيانة',
                    ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->emptyStateIcon('heroicon-o-clipboard-document')
            ->emptyStateHeading('لا توجد سجلات')
            ->emptyStateDescription('ستظهر هنا جميع الأنشطة المتعلقة بأصولك وصياناتها.');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivityLogs::route('/'),
        ];
    }

    // ─── Permissions ─────────────────────────────────────────────────────────

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('عرض سجل الأنشطة') ?? false;
    }

    public static function canCreate(): bool
    {
        return false; // السجلات تُنشأ تلقائياً
    }

    public static function canEdit(Model $record): bool
    {
        return false; // لا يُسمح بالتعديل
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    // ─── Query ───────────────────────────────────────────────────────────────

   public static function getEloquentQuery(): Builder
{
    $query = parent::getEloquentQuery();

    if (!auth()->check()) {
        return $query->whereRaw('0 = 1');
    }

    $userDepartmentNames = auth()->user()
        ->departments()
        ->pluck('departments.name')
        ->toArray();

    if (empty($userDepartmentNames)) {
        return $query->whereRaw('0 = 1');
    }

    return $query->where(function ($q) use ($userDepartmentNames) {

        // ── سجلات محفوظة مع department_name (الطريقة الجديدة) ──────────────
        $q->whereIn('department_name', $userDepartmentNames);

        // ── سجلات قديمة قبل الـ migration (بدون department_name) ───────────
        // نعرضها عبر join مع الأصول الموجودة حالياً
        $userDepartmentIds = auth()->user()
            ->departments()
            ->pluck('departments.id')
            ->toArray();

        $q->orWhere(function ($sub) use ($userDepartmentIds) {
            $sub->whereNull('department_name')
                ->where(function ($inner) use ($userDepartmentIds) {

                    // أصول موجودة
                    $inner->where('model_type', \App\Models\Asset::class)
                        ->whereIn('model_id', function ($i) use ($userDepartmentIds) {
                            $i->select('id')->from('assets')
                              ->whereIn('department_id', $userDepartmentIds);
                        });

                    // صيانة موجودة
                    $inner->orWhere('model_type', \App\Models\Maintenance::class)
                        ->whereIn('model_id', function ($i) use ($userDepartmentIds) {
                            $i->select('maintenances.id')->from('maintenances')
                              ->join('assets', 'maintenances.asset_id', '=', 'assets.id')
                              ->whereIn('assets.department_id', $userDepartmentIds);
                        });
                });
        });
    });
}

}
