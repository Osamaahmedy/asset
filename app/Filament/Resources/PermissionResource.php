<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PermissionResource\Pages;
use Filament\Resources\Resource;
use Spatie\Permission\Models\Permission;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class PermissionResource extends Resource
{
    protected static ?string $model = Permission::class;

    protected static ?string $navigationIcon   = 'heroicon-o-lock-closed';
    protected static ?int    $navigationSort   = 2;

    public static function getNavigationLabel(): string { return __('messages.resource.permissions'); }
    public static function getNavigationGroup(): ?string { return __('messages.nav.system_management'); }
    public static function getModelLabel(): string { return __('messages.resource.permission'); }
    public static function getPluralModelLabel(): string { return __('messages.resource.permissions'); }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make(__('messages.section.permission_info'))
                ->icon('heroicon-o-lock-closed')
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
            ->emptyStateIcon('heroicon-o-lock-closed')
            ->emptyStateHeading(__('messages.empty.no_permissions'));
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPermissions::route('/'),
            'create' => Pages\CreatePermission::route('/create'),
            'edit'   => Pages\EditPermission::route('/{record}/edit'),
        ];
    }

    // ─── Permissions ─────────────────────────────────────────────────────────

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('عرض الصلاحيات') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('إنشاء صلاحية') ?? false;
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()?->can('تعديل الصلاحيات') ?? false;
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()?->can('حذف الصلاحيات') ?? false;
    }
}
