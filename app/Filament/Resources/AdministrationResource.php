<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdministrationResource\Pages;
use App\Models\Administration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class AdministrationResource extends Resource
{
    protected static ?string $model = Administration::class;

    protected static ?string $navigationGroup  = 'إدارة الأصول';
    protected static ?string $navigationLabel  = 'الإدارات';
    protected static ?string $pluralModelLabel = 'الإدارات';
    protected static ?string $modelLabel       = 'إدارة';
    protected static ?string $navigationIcon   = 'heroicon-o-building-library';
    protected static ?int    $navigationSort   = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('معلومات الإدارة')
                ->icon('heroicon-o-building-library')
                ->schema([
                    Select::make('sector_id')
                        ->label('القطاع')
                        ->relationship('sector', 'name')
                        ->searchable()
                        ->preload()
                        ->required()
                        ->placeholder('اختر القطاع'),

                    TextInput::make('name')
                        ->label('اسم الإدارة')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('مثال: الإدارة العامة للموارد البشرية'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sector.name')
                    ->label('القطاع')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('gray'),

                TextColumn::make('name')
                    ->label('اسم الإدارة')
                    ->sortable()
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('departments_count')
                    ->label('عدد المكاتب')
                    ->counts('departments')
                    ->badge()
                    ->color('primary'),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y/m/d - h:i A')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make()->label('تعديل'),
                Tables\Actions\DeleteAction::make()
                    ->label('حذف')
                    ->before(function ($record, $action) {
                        if ($record->departments()->exists()) {
                            $action->cancel();
                            \Filament\Notifications\Notification::make()
                                ->title('لا يمكن حذف الإدارة')
                                ->body('تحتوي الإدارة على مكاتب مرتبطة.')
                                ->danger()
                                ->send();
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->label('حذف المحدد'),
            ])
            ->emptyStateIcon('heroicon-o-building-library')
            ->emptyStateHeading('لا توجد إدارات')
            ->emptyStateDescription('ابدأ بإضافة إدارة جديدة.');
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListAdministrations::route('/'),
            'create' => Pages\CreateAdministration::route('/create'),
            'edit'   => Pages\EditAdministration::route('/{record}/edit'),
        ];
    }

    // public static function canViewAny(): bool
    // {
    //     return auth()->user()?->can('عرض الإدارات') ?? false;
    // }

    // public static function canCreate(): bool
    // {
    //     return auth()->user()?->can('إنشاء إدارة') ?? false;
    // }

    // public static function canEdit(Model $record): bool
    // {
    //     return auth()->user()?->can('تعديل الإدارات') ?? false;
    // }

    // public static function canDelete(Model $record): bool
    // {
    //     return auth()->user()?->can('حذف الإدارات') ?? false;
    // }
}
