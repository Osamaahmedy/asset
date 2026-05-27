<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon   = 'heroicon-o-users';
    protected static ?int    $navigationSort   = 1;

    public static function getNavigationLabel(): string { return __('messages.resource.users'); }
    public static function getNavigationGroup(): ?string { return __('messages.nav.system_management'); }
    public static function getModelLabel(): string { return __('messages.resource.user'); }
    public static function getPluralModelLabel(): string { return __('messages.resource.users'); }

    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\Section::make(__('messages.section.basic_info'))
                ->icon('heroicon-o-user')
                ->columns(2)
                ->schema([
                    TextInput::make('name')
                        ->label(__('messages.field.name'))
                        ->required()
                        ->maxLength(255),

                    TextInput::make('email')
                        ->label(__('messages.field.email'))
                        ->email()
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255),
                ]),

            Forms\Components\Section::make(__('messages.section.password'))
                ->icon('heroicon-o-lock-closed')
                ->schema([
                    TextInput::make('password')
                        ->label(__('messages.field.password'))
                        ->password()
                        ->revealable()
                        ->dehydrateStateUsing(fn($state) => $state ? bcrypt($state) : null)
                        ->dehydrated(fn($state) => filled($state))
                        ->required(fn(string $context) => $context === 'create'),
                ]),

            Forms\Components\Section::make(__('messages.section.permissions_departments'))
                ->icon('heroicon-o-shield-check')
                ->columns(2)
                ->schema([
                    Select::make('roles')
                        ->label(__('messages.field.roles'))
                        ->relationship('roles', 'name')
                        ->multiple()
                        ->preload()
                        ->searchable(),

                    Select::make('departments')
                        ->label(__('messages.field.departments'))
                        ->relationship('departments', 'name')
                        ->multiple()
                        ->preload()
                        ->searchable(),
                ]),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable()
                    ->width('60px'),

                TextColumn::make('name')
                    ->label(__('messages.field.name'))
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('email')
                    ->label(__('messages.field.email'))
                    ->searchable()
                    ->sortable()
                    ->copyable(),

                TextColumn::make('roles.name')
                    ->label(__('messages.field.roles'))
                    ->badge()
                    ->separator(','),

                TextColumn::make('departments.name')
                    ->label(__('messages.field.departments'))
                    ->badge()
                    ->color('primary')
                    ->separator(','),

                TextColumn::make('created_at')
                    ->label(__('messages.field.created_at'))
                    ->date('Y/m/d')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('roles')
                    ->label(__('messages.resource.role'))
                    ->relationship('roles', 'name')
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->emptyStateIcon('heroicon-o-users')
            ->emptyStateHeading(__('messages.empty.no_users'));
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit'   => Pages\EditUser::route('/{record}/edit'),
            'view'   => Pages\ViewUser::route('/{record}'),
        ];
    }

    // ─── Permissions ─────────────────────────────────────────────────────────

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('عرض المستخدمين') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('إنشاء مستخدم') ?? false;
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()?->can('تعديل المستخدمين') ?? false;
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()?->can('حذف المستخدمين') ?? false;
    }
}
