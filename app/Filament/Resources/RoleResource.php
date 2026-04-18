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
    protected static ?string $navigationLabel  = 'الأدوار';
    protected static ?string $pluralModelLabel = 'الأدوار';
    protected static ?string $modelLabel       = 'دور';
    protected static ?string $navigationGroup  = 'إدارة النظام';
    protected static ?int    $navigationSort   = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('معلومات الدور')
                ->icon('heroicon-o-shield-check')
                ->schema([
                    TextInput::make('name')
                        ->label('اسم الدور')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255)
                        ->placeholder('مثال: مدير القسم'),
                ]),

            Forms\Components\Section::make('الصلاحيات')
                ->icon('heroicon-o-lock-closed')
                ->description('اختر الصلاحيات التي يملكها هذا الدور')
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
                    ->label('اسم الدور')
                    ->sortable()
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('permissions.name')
                    ->label('الصلاحيات')
                    ->badge()
                    ->separator(',')
                    ->limitList(4),

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
            ->emptyStateIcon('heroicon-o-shield-check')
            ->emptyStateHeading('لا توجد أدوار')
            ->emptyStateDescription('ابدأ بإضافة دور جديد وتحديد صلاحياته.');
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
