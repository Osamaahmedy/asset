<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use Filament\Resources\Resource;
use Spatie\Permission\Models\Role;
use Filament\Forms;
use Filament\Tables;
use Spatie\Permission\Models\Permission;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MultiSelect;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';
    protected static ?string $navigationLabel = 'الأدوار';
    protected static ?string $pluralLabel = 'الأدوار';
    protected static ?string $modelLabel = 'دور';


    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required()->label('اسم الدور'),
            MultiSelect::make('permissions')
                ->relationship('permissions', 'name')
                ->label('الصلاحيات')
                ->preload()  // يحمّل كل الصلاحيات دفعة واحدة لتسهيل الاختيار
                ->required(),
        ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('الاسم')->sortable()->searchable(),
                TextColumn::make('permissions.name')
                    ->label('الصلاحيات')
                    ->badge()
                    ->separator(', '),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view roles') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create roles') ?? false;
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()?->can('update roles') ?? false;
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()?->can('delete roles') ?? false;
    }

}
