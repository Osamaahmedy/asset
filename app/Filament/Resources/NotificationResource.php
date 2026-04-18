<?php

namespace App\Filament\Resources;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\NotificationResource\Pages;
use App\Models\Notification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;

class NotificationResource extends Resource
{
    protected static ?string $model = Notification::class;

    protected static ?string $navigationGroup = 'الإشعارات';
    protected static ?string $navigationIcon = 'heroicon-o-bell';
    protected static ?string $navigationLabel = 'الإشعارات';
    protected static ?string $pluralModelLabel = 'الإشعارات';
    protected static ?string $modelLabel = 'إشعار';

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        if (!auth()->check()) return null;

        $userDepartmentIds = auth()->user()
            ->departments()
            ->pluck('departments.id')
            ->toArray();

        if (empty($userDepartmentIds)) return null;

        $count = static::getModel()::query()
            ->where('is_read', false)
            ->whereHas('asset', fn($q) => $q->whereIn('department_id', $userDepartmentIds))
            ->count();

        return $count > 0 ? (string) $count : null;
    }

    // ── لون الكونتر ──────────────────────────────────────────────────────────
    public static function getNavigationBadgeColor(): ?string
    {
        return 'danger';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('تفاصيل الإشعار')
                ->icon('heroicon-o-bell')
                ->schema([
                    Forms\Components\Textarea::make('message')
                        ->label('نص الإشعار')
                        ->disabled()
                        ->rows(3)
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('status')
                        ->label('الحالة')
                        ->disabled(),

                    Forms\Components\Toggle::make('is_read')
                        ->label('تمت القراءة؟')
                        ->disabled(),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('message')
                    ->label('نص الإشعار')
                    ->searchable()
                    ->wrap()
                    ->limit(80),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('الحالة')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_read')
                    ->label('مقروء؟')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإشعار')
                    ->dateTime('Y/m/d - h:i A')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('unread')
                    ->label('غير المقروءة فقط')
                    ->query(fn($query) => $query->where('is_read', false))
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\Action::make('markAsRead')
                    ->label('تحديد كمقروء')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->visible(fn(Notification $record) => !$record->is_read)
                    ->action(fn(Notification $record) => $record->update(['is_read' => true]))
                    ->requiresConfirmation()
                    ->modalHeading('تحديد كمقروء')
                    ->modalDescription('هل تريد تحديد هذا الإشعار كمقروء؟')
                    ->modalSubmitActionLabel('نعم')
                    ->modalCancelActionLabel('إلغاء'),

                Tables\Actions\DeleteAction::make()
                    ->label('حذف'),
            ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('markAllRead')
                    ->label('تحديد الكل كمقروء')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->action(fn($records) => $records->each->update(['is_read' => true]))
                    ->requiresConfirmation()
                    ->modalHeading('تحديد الكل كمقروء')
                    ->modalSubmitActionLabel('نعم، حدّد الكل')
                    ->modalCancelActionLabel('إلغاء'),

                Tables\Actions\DeleteBulkAction::make()
                    ->label('حذف المحدد'),
            ])
            ->defaultSort('created_at', 'desc')
            ->emptyStateIcon('heroicon-o-bell-slash')
            ->emptyStateHeading('لا توجد إشعارات')
            ->emptyStateDescription('ستظهر هنا الإشعارات المتعلقة بأصولك.');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNotifications::route('/'),
        ];
    }

    // ─── Query ───────────────────────────────────────────────────────────────

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (!auth()->check()) {
            return $query->whereRaw('0 = 1');
        }

        $userDepartmentIds = auth()->user()
            ->departments()
            ->pluck('departments.id')
            ->toArray();

        if (empty($userDepartmentIds)) {
            return $query->whereRaw('0 = 1');
        }

        return $query->whereHas('asset', function ($q) use ($userDepartmentIds) {
            $q->whereIn('department_id', $userDepartmentIds);
        });
    }

    // ─── Permissions ─────────────────────────────────────────────────────────

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('عرض الإشعارات') ?? false;
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()?->can('حذف الإشعارات') ?? false;
    }
}
