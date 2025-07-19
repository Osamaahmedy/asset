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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
protected static ?string $pluralModelLabel = 'Asset Deletion Requests';

protected static ?string $navigationLabel = 'Asset Deletion Requests';

   public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('asset.name')
                ->label('Asset')
                ->disabled(),

            Forms\Components\TextInput::make('requestedBy.name')
                ->label('Requested By')
                ->disabled(),

            Forms\Components\Toggle::make('is_confirmed')
                ->label('Confirmed?')
                ->required(),
        ]);
}


    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('asset.name')
                ->label('Asset')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('requestedBy.name')
                ->label('Requested By')
                ->sortable(),

            Tables\Columns\BooleanColumn::make('is_confirmed')
                ->label('Confirmed')
                ->sortable(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Request Date')
                ->dateTime()
                ->sortable(),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAssetDeletionConfirmations::route('/'),
            'create' => Pages\CreateAssetDeletionConfirmation::route('/create'),
            'edit' => Pages\EditAssetDeletionConfirmation::route('/{record}/edit'),
        ];
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

    return $query->whereHas('asset', function ($q) use ($userDepartmentsIds) {
        $q->whereIn('department_id', $userDepartmentsIds);
    });
}
      public static function canViewAny(): bool
    {
        return auth()->user()?->can('view del') ?? false;
    }


public static function canEdit(Model $record): bool
{
    return auth()->user()?->can('update del') ?? false;
}

public static function canDelete(Model $record): bool
{
    return auth()->user()?->can('delete del') ?? false;
}
}
