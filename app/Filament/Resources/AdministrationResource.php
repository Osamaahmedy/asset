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

    protected static ?string $navigationIcon   = 'heroicon-o-building-library';
    protected static ?int    $navigationSort   = 2;

    public static function getNavigationLabel(): string { return __('messages.resource.administrations'); }
    public static function getNavigationGroup(): ?string { return __('messages.nav.asset_management'); }
    public static function getModelLabel(): string { return __('messages.resource.administration'); }
    public static function getPluralModelLabel(): string { return __('messages.resource.administrations'); }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make(__('messages.section.admin_info'))
                ->icon('heroicon-o-building-library')
                ->schema([
                    Select::make('sector_id')
                        ->label(__('messages.field.sector'))
                        ->relationship('sector', 'name')
                        ->searchable()
                        ->preload()
                        ->required()
                        ->placeholder(__('messages.field.sector')),

                    TextInput::make('name')
                        ->label(__('messages.field.name'))
                        ->required()
                        ->maxLength(255)
                        ->placeholder(__('messages.field.name')),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sector.name')
                    ->label(__('messages.field.sector'))
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('gray'),

                TextColumn::make('name')
                    ->label(__('messages.field.name'))
                    ->sortable()
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('departments_count')
                    ->label(__('messages.field.office_count'))
                    ->counts('departments')
                    ->badge()
                    ->color('primary'),

                TextColumn::make('created_at')
                    ->label(__('messages.field.created_at'))
                    ->dateTime('Y/m/d - h:i A')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record, $action) {
                        if ($record->departments()->exists()) {
                            $action->cancel();
                            \Filament\Notifications\Notification::make()
                                ->title(__('messages.action.no'))
                                ->body(__('messages.action.no'))
                                ->danger()
                                ->send();
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->emptyStateIcon('heroicon-o-building-library')
            ->emptyStateHeading(__('messages.empty.no_administrations'));
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
