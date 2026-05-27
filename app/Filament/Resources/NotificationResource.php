<?php

namespace App\Filament\Resources;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\NotificationResource\Pages;
use App\Models\AssetNotification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;

class NotificationResource extends Resource
{
    protected static ?string $model = AssetNotification::class;

    protected static ?string $navigationIcon = 'heroicon-o-bell';
    protected static ?int $navigationSort = 1;

    public static function getNavigationLabel(): string { return __('messages.resource.notifications'); }
    public static function getNavigationGroup(): ?string { return __('messages.nav.notifications'); }
    public static function getModelLabel(): string { return __('messages.resource.notification'); }
    public static function getPluralModelLabel(): string { return __('messages.resource.notifications'); }

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
            Forms\Components\Section::make(__('messages.section.notification_details'))
                ->icon('heroicon-o-bell')
                ->schema([
                    Forms\Components\Textarea::make('message')
                        ->label(__('messages.field.notification_text'))
                        ->disabled()
                        ->rows(3)
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('status')
                        ->label(__('messages.field.status'))
                        ->disabled(),

                    Forms\Components\Toggle::make('is_read')
                        ->label(__('messages.field.is_read'))
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
                    ->label(__('messages.field.notification_text'))
                    ->searchable()
                    ->wrap()
                    ->limit(80),

                Tables\Columns\BadgeColumn::make('status')
                    ->label(__('messages.field.status'))
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_read')
                    ->label(__('messages.field.is_read'))
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('messages.field.notification_date'))
                    ->dateTime('Y/m/d - h:i A')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('unread')
                    ->label(__('messages.field.unread_only'))
                    ->query(fn($query) => $query->where('is_read', false))
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\Action::make('markAsRead')
                    ->label(__('messages.action.mark_as_read'))
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->visible(fn(AssetNotification $record) => !$record->is_read)
                    ->action(fn(AssetNotification $record) => $record->update(['is_read' => true]))
                    ->requiresConfirmation()
                    ->modalHeading(__('messages.action.mark_as_read'))
                    ->modalDescription(__('messages.action.confirm'))
                    ->modalSubmitActionLabel(__('messages.action.yes'))
                    ->modalCancelActionLabel(__('messages.action.no')),

                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('markAllRead')
                    ->label(__('messages.action.mark_all_as_read'))
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->action(fn($records) => $records->each->update(['is_read' => true]))
                    ->requiresConfirmation()
                    ->modalHeading(__('messages.action.mark_all_as_read'))
                    ->modalSubmitActionLabel(__('messages.action.yes'))
                    ->modalCancelActionLabel(__('messages.action.no')),

                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('created_at', 'desc')
            ->emptyStateIcon('heroicon-o-bell-slash')
            ->emptyStateHeading(__('messages.empty.no_notifications'));
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
