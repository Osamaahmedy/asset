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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ActivityLogResource extends Resource
{
    protected static ?string $model = ActivityLog::class;
    protected static ?string $navigationLabel = 'سجل العمليات';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('description')
                    ->label('تفاصيل إضافية')
                    ->wrap()
                    ->searchable(),

                TextColumn::make('action')
                    ->label('نوع العملية')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('model_type')
                    ->label('نوع النموذج')
                    ->formatStateUsing(fn($state) => class_basename($state))
                    ->sortable(),

                TextColumn::make('model_id')
                    ->label('معرف النموذج'),

                TextColumn::make('created_at')
                    ->label('تاريخ العملية')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('modelName')
                    ->label('اسم الأصل أو الصيانة')
                    ->getStateUsing(function (ActivityLog $record) {
                        $model = $record->model;

                        if ($model instanceof Asset) {
                            return $model->name;
                        }

                        if ($model instanceof Maintenance) {
                            return 'صيانة الأصل: ' . ($model->asset->name ?? 'غير معروف');
                        }

                        return $record->description ?? 'غير متوفر';
                    }),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivityLogs::route('/'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view activ') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create activ') ?? false;
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()?->can('update activ') ?? false;
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()?->can('delete activ') ?? false;
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (!auth()->check()) {
            return $query->whereRaw('0 = 1');
        }

        $userDepartmentsIds = auth()->user()->departments()->pluck('departments.id')->toArray();

        if (empty($userDepartmentsIds)) {
            return $query->whereRaw('0 = 1');
        }

        return $query->where(function ($q) use ($userDepartmentsIds) {
            // سجلات الأصول حتى لو الأصل محذوف (بدون تحقق من وجوده)
            $q->where('model_type', Asset::class);

            // سجلات الصيانة التي ترتبط بأصول في أقسام المستخدم
            $q->orWhere(function ($sub) use ($userDepartmentsIds) {
                $sub->where('model_type', Maintenance::class)
                    ->whereIn('model_id', function ($subQuery) use ($userDepartmentsIds) {
                        $subQuery->select('maintenances.id')
                            ->from('maintenances')
                            ->join('assets', 'maintenances.asset_id', '=', 'assets.id')
                            ->whereIn('assets.department_id', $userDepartmentsIds);
                    });
            });
        });
    }
}
