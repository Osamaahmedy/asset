<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetHandoverResource\Pages;
use App\Filament\Resources\AssetHandoverResource\RelationManagers;
use App\Models\AssetHandover;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AssetHandoverResource extends Resource
{
    protected static ?string $model = AssetHandover::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-check';

    public static function getNavigationLabel(): string { return __('messages.resource.asset_handovers'); }
    public static function getNavigationGroup(): ?string { return __('messages.nav.asset_management'); }
    public static function getModelLabel(): string { return __('messages.resource.asset_handover'); }
    public static function getPluralModelLabel(): string { return __('messages.resource.asset_handovers'); }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('asset_id')
                    ->label(__('messages.field.asset'))
                    ->relationship('asset', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('employee_id')
                    ->label(__('messages.field.employee'))
                    ->relationship('employee', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\DatePicker::make('handed_over_at')
                    ->label(__('messages.field.handed_over_at'))
                    ->required(),
                Forms\Components\DatePicker::make('returned_at')
                    ->label(__('messages.field.returned_at')),
                Forms\Components\TextInput::make('condition_on_handover')
                    ->label(__('messages.field.condition_on_handover'))
                    ->maxLength(191),
                Forms\Components\TextInput::make('condition_on_return')
                    ->label(__('messages.field.condition_on_return'))
                    ->maxLength(191),
                Forms\Components\Textarea::make('notes')
                    ->label(__('messages.field.notes'))
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('asset.name')
                    ->label(__('messages.field.asset'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('employee.name')
                    ->label(__('messages.field.employee'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('handed_over_at')
                    ->label(__('messages.field.handed_over_at'))
                    ->date('Y/m/d')
                    ->sortable(),
                Tables\Columns\TextColumn::make('returned_at')
                    ->label(__('messages.field.returned_at'))
                    ->date('Y/m/d')
                    ->sortable(),
                Tables\Columns\TextColumn::make('condition_on_handover')
                    ->label(__('messages.field.condition_on_handover'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('condition_on_return')
                    ->label(__('messages.field.condition_on_return'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssetHandovers::route('/'),
            'create' => Pages\CreateAssetHandover::route('/create'),
            'edit' => Pages\EditAssetHandover::route('/{record}/edit'),
        ];
    }
}
