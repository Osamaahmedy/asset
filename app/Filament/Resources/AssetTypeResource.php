<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetTypeResource\Pages;
use App\Models\AssetType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class AssetTypeResource extends Resource
{
    protected static ?string $model = AssetType::class;

    protected static ?string $navigationIcon   = 'heroicon-o-tag';
    protected static ?int    $navigationSort   = 4;

    public static function getNavigationLabel(): string { return __('messages.resource.asset_types'); }
    public static function getNavigationGroup(): ?string { return __('messages.nav.asset_management'); }
    public static function getModelLabel(): string { return __('messages.resource.asset_type'); }
    public static function getPluralModelLabel(): string { return __('messages.resource.asset_types'); }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make(__('messages.section.type_info'))
                ->icon('heroicon-o-tag')
                ->schema([
                    TextInput::make('name')
                        ->label(__('messages.field.name'))
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255)
                        ->placeholder(__('messages.field.name')),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('messages.field.name'))
                    ->sortable()
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('assets_count')
                    ->label(__('messages.field.asset_count'))
                    ->counts('assets')
                    ->badge()
                    ->color('primary'),

                TextColumn::make('created_at')
                    ->label(__('messages.field.created_at'))
                    ->dateTime('Y/m/d - h:i A')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record, $action) {
                        if ($record->assets()->exists()) {
                            $action->cancel();
                            \Filament\Notifications\Notification::make()
                                ->title(__('messages.action.no'))
                                ->body(__('messages.action.no'))
                                ->danger()
                                ->send();
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->emptyStateIcon('heroicon-o-tag')
            ->emptyStateHeading(__('messages.empty.no_types'));
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListAssetTypes::route('/'),
            'create' => Pages\CreateAssetType::route('/create'),
            'edit'   => Pages\EditAssetType::route('/{record}/edit'),
        ];
    }

    // public static function canViewAny(): bool
    // {
    //     return auth()->user()?->can('عرض أنواع الأصول') ?? false;
    // }

    // public static function canCreate(): bool
    // {
    //     return auth()->user()?->can('إنشاء نوع أصل') ?? false;
    // }

    // public static function canEdit(Model $record): bool
    // {
    //     return auth()->user()?->can('تعديل أنواع الأصول') ?? false;
    // }

    // public static function canDelete(Model $record): bool
    // {
    //     return auth()->user()?->can('حذف أنواع الأصول') ?? false;
    // }
}
