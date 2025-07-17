<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MultiSelect;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
                use Filament\Forms\Components\Select;


class UserResource extends Resource
{
    protected static ?string $model = \App\Models\User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required()->label('الاسم'),
            TextInput::make('email')->email()->required()->label('البريد الإلكتروني'),
            TextInput::make('password')
                ->password()
                ->label('كلمة المرور')
                ->dehydrateStateUsing(fn ($state) => $state ? bcrypt($state) : null)
                ->dehydrated(fn ($state) => filled($state))
                ->required(fn (string $context) => $context === 'create'),
            MultiSelect::make('roles') // حقل الأدوار
                ->relationship('roles', 'name') // يرتبط بعلاقة roles في موديل User
                ->preload() // يحمل الخيارات مسبقًا
                ->label('الأدوار'),
                 Select::make('departments')
            ->multiple()
            ->relationship('departments', 'name')
            ->label('الأقسام'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id')->label('#')->sortable(),
            TextColumn::make('name')->label('الاسم')->searchable()->sortable(),
            TextColumn::make('email')->label('البريد الإلكتروني')->searchable()->sortable(),
            TextColumn::make('created_at')->label('تاريخ الإنشاء')->date()->sortable(),
            TextColumn::make('roles.name')->label('الأدوار')->sortable(), // عرض الأدوار في الجدول
        ])->actions([
            Tables\Actions\EditAction::make()->label('تعديل'),
            Tables\Actions\ViewAction::make()->label('عرض'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
            'view' => Pages\ViewUser::route('/{record}'),
        ];
    }
    public static function canViewAny(): bool
    {
        return auth()->user()?->can('view users') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('create users') ?? false;
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()?->can('update users') ?? false;
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()?->can('delete users') ?? false;
    }

}
