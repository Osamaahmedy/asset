<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectorResource\Pages;
use App\Models\Sector;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class SectorResource extends Resource
{
    protected static ?string $model = Sector::class;

    protected static ?string $navigationGroup  = 'إدارة الأصول';
    protected static ?string $navigationLabel  = 'القطاعات';
    protected static ?string $pluralModelLabel = 'القطاعات';
    protected static ?string $modelLabel       = 'قطاع';
    protected static ?string $navigationIcon   = 'heroicon-o-globe-alt';
    protected static ?int    $navigationSort   = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('معلومات القطاع')
                ->icon('heroicon-o-globe-alt')
                ->schema([
                    TextInput::make('name')
                        ->label('اسم القطاع')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255)
                        ->placeholder('مثال: قطاع الخدمات'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('اسم القطاع')
                    ->sortable()
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('administrations_count')
                    ->label('عدد الإدارات')
                    ->counts('administrations')
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
                        if ($record->administrations()->exists()) {
                            $action->cancel();
                            \Filament\Notifications\Notification::make()
                                ->title('لا يمكن حذف القطاع')
                                ->body('يحتوي القطاع على إدارات مرتبطة.')
                                ->danger()
                                ->send();
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->label('حذف المحدد'),
            ])
            ->emptyStateIcon('heroicon-o-globe-alt')
            ->emptyStateHeading('لا توجد قطاعات')
            ->emptyStateDescription('ابدأ بإضافة قطاع جديد.');
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListSectors::route('/'),
            'create' => Pages\CreateSector::route('/create'),
            'edit'   => Pages\EditSector::route('/{record}/edit'),
        ];
    }

    // public static function canViewAny(): bool
    // {
    //     return auth()->user()?->can('عرض القطاعات') ?? false;
    // }

    // public static function canCreate(): bool
    // {
    //     return auth()->user()?->can('إنشاء قطاع') ?? false;
    // }

    // public static function canEdit(Model $record): bool
    // {
    //     return auth()->user()?->can('تعديل القطاعات') ?? false;
    // }

    // public static function canDelete(Model $record): bool
    // {
    //     return auth()->user()?->can('حذف القطاعات') ?? false;
    // }
}
