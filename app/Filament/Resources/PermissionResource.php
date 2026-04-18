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
    protected static ?string $navigationLabel  = 'الصلاحيات';
    protected static ?string $pluralModelLabel = 'الصلاحيات';
    protected static ?string $modelLabel       = 'صلاحية';
    protected static ?string $navigationGroup  = 'إدارة النظام';
    protected static ?int    $navigationSort   = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('معلومات الصلاحية')
                ->icon('heroicon-o-lock-closed')
                ->schema([
                    TextInput::make('name')
                        ->label('اسم الصلاحية')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255)
                        ->placeholder('مثال: عرض الأصول'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('اسم الصلاحية')
                    ->sortable()
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->date('Y/m/d')
                    ->sortable(),
            ])
            ->defaultSort('name', 'asc')
            ->actions([
                Tables\Actions\EditAction::make()->label('تعديل'),
                Tables\Actions\DeleteAction::make()->label('حذف'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->label('حذف المحدد'),
            ])
            ->emptyStateIcon('heroicon-o-lock-closed')
            ->emptyStateHeading('لا توجد صلاحيات')
            ->emptyStateDescription('ابدأ بإضافة صلاحية جديدة.');
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
