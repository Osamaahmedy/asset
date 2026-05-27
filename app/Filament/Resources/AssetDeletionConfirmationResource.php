<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetDeletionConfirmationResource\Pages;
use App\Models\AssetDeletionConfirmation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AssetDeletionConfirmationResource extends Resource
{
    protected static ?string $model = AssetDeletionConfirmation::class;

    protected static ?string $navigationIcon  = 'heroicon-o-trash';
    protected static ?int    $navigationSort  = 2;

    public static function getNavigationLabel(): string { return __('messages.resource.deletion_requests'); }
    public static function getNavigationGroup(): ?string { return __('messages.nav.asset_management'); }
    public static function getModelLabel(): string { return __('messages.resource.deletion_request'); }
    public static function getPluralModelLabel(): string { return __('messages.resource.deletion_requests'); }

    // ── كونتر: عدد الطلبات غير المؤكدة ──────────────────────────────────────
    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::query()
            ->where('is_confirmed', false)
            ->count();

        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make(__('messages.section.deletion_details'))
                ->icon('heroicon-o-trash')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('asset.name')
                        ->label(__('messages.field.asset'))
                        ->disabled(),

                    Forms\Components\TextInput::make('requestedBy.name')
                        ->label(__('messages.field.by_user'))
                        ->disabled(),
                ]),

            Forms\Components\Section::make(__('messages.section.deletion_decision'))
                ->icon('heroicon-o-check-circle')
                ->schema([
                    Forms\Components\Toggle::make('is_confirmed')
                        ->label(__('messages.action.confirm_deletion'))
                        ->onColor('danger')
                        ->offColor('success')
                        ->required(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('asset.name')
                    ->label(__('messages.field.asset'))
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->placeholder('—'),

                Tables\Columns\TextColumn::make('asset.department.name')
                    ->label(__('messages.field.department'))
                    ->badge()
                    ->placeholder('—'),

                Tables\Columns\TextColumn::make('requestedBy.name')
                    ->label(__('messages.field.by_user'))
                    ->sortable()
                    ->placeholder('—'),

                Tables\Columns\IconColumn::make('is_confirmed')
                    ->label(__('messages.field.status'))
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-clock')
                    ->trueColor('danger')
                    ->falseColor('warning')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('messages.field.created_at'))
                    ->dateTime('Y/m/d - h:i A')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\Action::make('confirm')
                    ->label(__('messages.action.confirm_deletion'))
                    ->icon('heroicon-o-check')
                    ->color('danger')
                    ->visible(fn(AssetDeletionConfirmation $record) => !$record->is_confirmed)
                    ->requiresConfirmation()
                    ->modalHeading(__('messages.action.confirm_deletion'))
                    ->modalSubmitActionLabel(__('messages.action.yes'))
                    ->modalCancelActionLabel(__('messages.action.no'))
                    ->action(function (AssetDeletionConfirmation $record) {
                        $record->update(['is_confirmed' => true]);

                        \Filament\Notifications\Notification::make()
                            ->title(__('messages.profile.saved'))
                            ->danger()
                            ->send();
                    }),

                Tables\Actions\Action::make('reject')
                    ->label(__('messages.action.reject'))
                    ->icon('heroicon-o-x-circle')
                    ->color('gray')
                    ->visible(fn(AssetDeletionConfirmation $record) => !$record->is_confirmed)
                    ->requiresConfirmation()
                    ->modalHeading(__('messages.action.reject'))
                    ->modalSubmitActionLabel(__('messages.action.yes'))
                    ->modalCancelActionLabel(__('messages.action.no'))
                    ->action(function (AssetDeletionConfirmation $record) {
                        $record->delete();

                        \Filament\Notifications\Notification::make()
                            ->title(__('messages.profile.saved'))
                            ->warning()
                            ->send();
                    }),

                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->emptyStateIcon('heroicon-o-trash')
            ->emptyStateHeading(__('messages.empty.no_deletion_requests'));
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListAssetDeletionConfirmations::route('/'),
            'create' => Pages\CreateAssetDeletionConfirmation::route('/create'),
            'edit'   => Pages\EditAssetDeletionConfirmation::route('/{record}/edit'),
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
        return auth()->user()?->can('عرض طلبات الحذف') ?? false;
    }

    public static function canCreate(): bool
    {
        return false; // الطلبات تُنشأ من صفحة الأصول فقط
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()?->can('تعديل طلبات الحذف') ?? false;
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()?->can('حذف طلبات الحذف') ?? false;
    }
}
