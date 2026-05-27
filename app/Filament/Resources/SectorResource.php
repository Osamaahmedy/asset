<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectorResource\Pages;
use App\Models\Sector;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class SectorResource extends Resource
{
    protected static ?string $model = Sector::class;

    protected static ?string $navigationIcon   = 'heroicon-o-globe-alt';
    protected static ?int    $navigationSort   = 1;

    public static function getNavigationLabel(): string { return __('messages.resource.sectors'); }
    public static function getNavigationGroup(): ?string { return __('messages.nav.asset_management'); }
    public static function getModelLabel(): string { return __('messages.resource.sector'); }
    public static function getPluralModelLabel(): string { return __('messages.resource.sectors'); }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make(__('messages.section.sector_info'))
                ->icon('heroicon-o-globe-alt')
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

                TextColumn::make('administrations_count')
                    ->label(__('messages.field.admin_count'))
                    ->counts('administrations')
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
                        if ($record->administrations()->exists()) {
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
            ->emptyStateIcon('heroicon-o-globe-alt')
            ->emptyStateHeading(__('messages.empty.no_sectors'));
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListSectors::route('/'),
            'create' => Pages\CreateSector::route('/create'),
            'edit'   => Pages\EditSector::route('/{record}/edit'),
        ];
    }

    // public static function canViewAny(): bool
    // {
    //     return auth()->user()?->can('عرض القطاعات') ?? false;
    // }

    // public static function canCreate(): bool
    // {
    //     return auth()->user()?->can('إنشاء قطاع') ?? false;
    // }

    // public static function canEdit(Model $record): bool
    // {
    //     return auth()->user()?->can('تعديل القطاعات') ?? false;
    // }

    // public static function canDelete(Model $record): bool
    // {
    //     return auth()->user()?->can('حذف القطاعات') ?? false;
    // }
}
