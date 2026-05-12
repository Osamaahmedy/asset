<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetTypeResource\Pages;
use App\Models\AssetType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class AssetTypeResource extends Resource
{
    protected static ?string $model = AssetType::class;

    protected static ?string $navigationGroup  = 'إدارة الأصول';
    protected static ?string $navigationLabel  = 'أنواع الأصول';
    protected static ?string $pluralModelLabel = 'أنواع الأصول';
    protected static ?string $modelLabel       = 'نوع أصل';
    protected static ?string $navigationIcon   = 'heroicon-o-tag';
    protected static ?int    $navigationSort   = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('معلومات النوع')
                ->icon('heroicon-o-tag')
                ->schema([
                    TextInput::make('name')
                        ->label('اسم النوع')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255)
                        ->placeholder('مثال: حاسوب، طابعة، جهاز عرض'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('اسم النوع')
                    ->sortable()
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('assets_count')
                    ->label('عدد الأصول')
                    ->counts('assets')
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
                        if ($record->assets()->exists()) {
                            $action->cancel();
                            \Filament\Notifications\Notification::make()
                                ->title('لا يمكن حذف النوع')
                                ->body('يوجد أصول مرتبطة بهذا النوع.')
                                ->danger()
                                ->send();
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->label('حذف المحدد'),
            ])
            ->emptyStateIcon('heroicon-o-tag')
            ->emptyStateHeading('لا توجد أنواع')
            ->emptyStateDescription('ابدأ بإضافة نوع أصل جديد.');
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListAssetTypes::route('/'),
            'create' => Pages\CreateAssetType::route('/create'),
            'edit'   => Pages\EditAssetType::route('/{record}/edit'),
        ];
    }

    // public static function canViewAny(): bool
    // {
    //     return auth()->user()?->can('عرض أنواع الأصول') ?? false;
    // }

    // public static function canCreate(): bool
    // {
    //     return auth()->user()?->can('إنشاء نوع أصل') ?? false;
    // }

    // public static function canEdit(Model $record): bool
    // {
    //     return auth()->user()?->can('تعديل أنواع الأصول') ?? false;
    // }

    // public static function canDelete(Model $record): bool
    // {
    //     return auth()->user()?->can('حذف أنواع الأصول') ?? false;
    // }
}
