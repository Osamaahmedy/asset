<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityLogResource\Pages;
use App\Models\ActivityLog;
use App\Models\Asset;
use App\Models\Maintenance;
use App\Models\MaintenanceRequest;
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

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?int $navigationSort = 1;

    public static function getNavigationLabel(): string { return __('messages.resource.activity_logs'); }
    public static function getNavigationGroup(): ?string { return __('messages.nav.reports'); }
    public static function getModelLabel(): string { return __('messages.resource.activity_log'); }
    public static function getPluralModelLabel(): string { return __('messages.resource.activity_logs'); }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('model_name')
                    ->label(__('messages.field.name'))
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->placeholder('—')
                    ->description(fn(ActivityLog $record) => $record->department_name
                        ? __('messages.field.office') . ': ' . $record->department_name
                        : null),

                TextColumn::make('user_name')
                    ->label(__('messages.field.by_user'))
                    ->searchable()
                    ->sortable()
                    ->placeholder('System')
                    ->icon('heroicon-o-user'),

                BadgeColumn::make('action')
                    ->label(__('messages.field.action_type'))
                    ->sortable()
                    ->searchable()
                    ->colors([
                        'success' => fn($state) => in_array($state, ['created', 'إنشاء']),
                        'warning' => fn($state) => in_array($state, ['updated', 'تعديل']),
                        'danger'  => fn($state) => in_array($state, ['deleted', 'حذف']),
                        'info'    => fn($state) => in_array($state, ['maintenance', 'صيانة']),
                    ])
                    ->formatStateUsing(fn($state) => match ($state) {
                        'created'     => '✅ ' . __('messages.action.create'),
                        'updated'     => '✏️ ' . __('messages.action.edit'),
                        'deleted'     => '🗑️ ' . __('messages.action.delete'),
                        'maintenance' => '🔧 ' . __('messages.resource.maintenance'),
                        default       => $state,
                    }),

                BadgeColumn::make('model_type')
                    ->label(__('messages.field.item_type'))
                    ->sortable()
                    ->formatStateUsing(fn($state) => match (class_basename($state)) {
                        'Asset'              => '📦 ' . __('messages.resource.asset'),
                        'Maintenance'        => '🔧 ' . __('messages.resource.maintenance'),
                        'MaintenanceRequest' => '📋 ' . __('messages.resource.maintenance_request'),
                        default              => class_basename($state),
                    })
                    ->colors([
                        'primary' => fn($state) => class_basename($state) === 'Asset',
                        'warning' => fn($state) => class_basename($state) === 'Maintenance',
                        'info'    => fn($state) => class_basename($state) === 'MaintenanceRequest',
                    ]),

                TextColumn::make('description')
                    ->label(__('messages.field.description'))
                    ->wrap()
                    ->searchable()
                    ->placeholder('—')
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label(__('messages.field.action_date'))
                    ->dateTime('Y/m/d - h:i A')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('action')
                    ->label(__('messages.field.action_type'))
                    ->options([
                        'created'     => __('messages.action.create'),
                        'updated'     => __('messages.action.edit'),
                        'deleted'     => __('messages.action.delete'),
                        'maintenance' => __('messages.resource.maintenance'),
                    ]),

                Tables\Filters\SelectFilter::make('model_type')
                    ->label(__('messages.field.item_type'))
                    ->options([
                        Asset::class       => __('messages.resource.asset'),
                        Maintenance::class => __('messages.resource.maintenance'),
                        MaintenanceRequest::class => __('messages.resource.maintenance_request'),
                    ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->emptyStateIcon('heroicon-o-clipboard-document')
            ->emptyStateHeading(__('messages.empty.no_activity_logs'));
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

    $user = auth()->user();
    
    // إذا كان المستخدم لا يملك أقسام مرتبطة به (مثل مدير النظام)، اعرض له كل شيء
    $userDepartmentNames = $user->departments()->pluck('departments.name')->toArray();

    if (empty($userDepartmentNames)) {
        return $query;
    }

    return $query->where(function ($q) use ($userDepartmentNames, $user) {

        // ── سجلات محفوظة مع department_name (الطريقة الجديدة) ──────────────
        $q->whereIn('department_name', $userDepartmentNames);

        // ── سجلات قديمة قبل الـ migration (بدون department_name) ───────────
        $userDepartmentIds = $user->departments()->pluck('departments.id')->toArray();

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
