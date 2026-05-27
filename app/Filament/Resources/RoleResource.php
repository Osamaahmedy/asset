<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use Filament\Resources\Resource;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon   = 'heroicon-o-shield-check';
    protected static ?int    $navigationSort   = 3;

    public static function getNavigationLabel(): string { return __('messages.resource.roles'); }
    public static function getNavigationGroup(): ?string { return __('messages.nav.system_management'); }
    public static function getModelLabel(): string { return __('messages.resource.role'); }
    public static function getPluralModelLabel(): string { return __('messages.resource.roles'); }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make(__('messages.section.role_info'))
                ->icon('heroicon-o-shield-check')
                ->schema([
                    TextInput::make('name')
                        ->label(__('messages.field.name'))
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255)
                        ->placeholder(__('messages.field.name')),
                ]),

            Forms\Components\Section::make(__('messages.section.permissions'))
                ->icon('heroicon-o-lock-closed')
                ->schema([
                    Forms\Components\CheckboxList::make('permissions')
                        ->relationship('permissions', 'name')
                        ->label('')
                        ->searchable()
                        ->bulkToggleable()
                        ->gridDirection('row')
                        ->columns(3),
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

                TextColumn::make('permissions.name')
                    ->label(__('messages.section.permissions'))
                    ->badge()
                    ->separator(',')
                    ->limitList(4),

                TextColumn::make('created_at')
                    ->label(__('messages.field.created_at'))
                    ->date('Y/m/d')
                    ->sortable(),
            ])
            ->defaultSort('name', 'asc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->emptyStateIcon('heroicon-o-shield-check')
            ->emptyStateHeading(__('messages.empty.no_roles'));
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit'   => Pages\EditRole::route('/{record}/edit'),
        ];
    }

    // ─── Permissions ─────────────────────────────────────────────────────────

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('عرض الأدوار') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('إنشاء دور') ?? false;
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()?->can('تعديل الأدوار') ?? false;
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()?->can('حذف الأدوار') ?? false;
    }
}
