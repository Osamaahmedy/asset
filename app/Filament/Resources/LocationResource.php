<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LocationResource\Pages;
use App\Models\Location;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class LocationResource extends Resource
{
    protected static ?string $model = Location::class;
    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
    protected static ?int $navigationSort = 5;

    public static function getNavigationLabel(): string { return __('messages.resource.locations'); }
    public static function getNavigationGroup(): ?string { return __('messages.nav.asset_management'); }
    public static function getModelLabel(): string { return __('messages.resource.location'); }
    public static function getPluralModelLabel(): string { return __('messages.resource.locations'); }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make(__('messages.resource.location'))
                ->icon('heroicon-o-map-pin')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label(__('messages.field.name'))
                        ->required()
                        ->maxLength(191)
                        ->columnSpanFull(),

                    Forms\Components\Select::make('parent_id')
                        ->label(__('messages.field.parent_location'))
                        ->placeholder(__('messages.field.root_location'))
                        ->options(function (?Location $record) {
                            return Location::query()
                                ->when(
                                    $record?->id,
                                    fn ($q) => $q->where('id', '!=', $record->id)
                                )
                                ->pluck('name', 'id');
                        })
                        ->searchable()
                        ->nullable()
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('messages.field.name'))
                    ->searchable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('parent.name')
                    ->label(__('messages.field.parent_location'))
                    ->badge()
                    ->color('info')
                    ->placeholder('—')
                    ->sortable(),

                Tables\Columns\TextColumn::make('children_count')
                    ->label(__('messages.field.sub_locations'))
                    ->counts('children')
                    ->badge()
                    ->color('success'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('messages.field.created_at'))
                    ->dateTime('Y/m/d')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('name')
            ->filters([
                Tables\Filters\Filter::make('root_only')
                    ->label(__('messages.filter.root_locations'))
                    ->query(fn (Builder $query) => $query->whereNull('parent_id'))
                    ->toggle(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record, $action) {
                        if ($record->children()->exists()) {
                            \Filament\Notifications\Notification::make()
                                ->title(__('messages.error.has_children'))
                                ->danger()
                                ->send();
                            $action->cancel();
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateIcon('heroicon-o-map-pin')
            ->emptyStateHeading(__('messages.empty.no_locations'));
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListLocations::route('/'),
            'create' => Pages\CreateLocation::route('/create'),
            'edit'   => Pages\EditLocation::route('/{record}/edit'),
        ];
    }
}
