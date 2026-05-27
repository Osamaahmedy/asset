<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VendorResource\Pages;
use App\Filament\Resources\VendorResource\RelationManagers;
use App\Models\Vendor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VendorResource extends Resource
{
    protected static ?string $model = Vendor::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    public static function getNavigationLabel(): string { return __('messages.resource.vendors'); }
    public static function getNavigationGroup(): ?string { return __('messages.nav.asset_management'); }
    public static function getModelLabel(): string { return __('messages.resource.vendor'); }
    public static function getPluralModelLabel(): string { return __('messages.resource.vendors'); }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('messages.field.name'))
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('contact_person')
                    ->label(__('messages.field.contact_person'))
                    ->maxLength(191),
                Forms\Components\TextInput::make('phone')
                    ->label(__('messages.field.phone'))
                    ->tel()
                    ->maxLength(191),
                Forms\Components\TextInput::make('email')
                    ->label(__('messages.field.email'))
                    ->email()
                    ->maxLength(191),
                Forms\Components\Textarea::make('address')
                    ->label(__('messages.field.address'))
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('messages.field.name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_person')
                    ->label(__('messages.field.contact_person'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label(__('messages.field.phone'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label(__('messages.field.email'))
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
                Tables\Filters\Filter::make('has_assets')
                    ->label('لديه أصول')
                    ->query(fn (Builder $query) => $query->has('assets')),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListVendors::route('/'),
            'create' => Pages\CreateVendor::route('/create'),
            'edit' => Pages\EditVendor::route('/{record}/edit'),
        ];
    }
}
