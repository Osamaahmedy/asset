<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExternalMaintenanceRequestResource\Pages;
use App\Models\ExternalMaintenanceRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class ExternalMaintenanceRequestResource extends Resource
{
    protected static ?string $model = ExternalMaintenanceRequest::class;

    protected static ?string $navigationIcon   = 'heroicon-o-arrow-top-right-on-square';
    protected static ?int    $navigationSort   = 4;

    public static function getNavigationLabel(): string { return __('messages.resource.external_requests'); }
    public static function getNavigationGroup(): ?string { return __('messages.nav.asset_management'); }
    public static function getModelLabel(): string { return __('messages.resource.external_request'); }
    public static function getPluralModelLabel(): string { return __('messages.resource.external_requests'); }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make(__('messages.section.original_request_data'))
                ->icon('heroicon-o-clipboard-document-list')
                ->collapsed()
                ->schema([
                    Select::make('maintenance_request_id')
                        ->label(__('messages.resource.maintenance_request'))
                        ->relationship(
                            'maintenanceRequest',
                            'id',
                            fn($query) => $query->with('asset')
                        )
                        ->getOptionLabelFromRecordUsing(
                            fn($record) => "#{$record->id} — {$record->asset?->name}"
                        )
                        ->searchable()
                        ->preload()
                        ->required()
                        ->disabled(fn($context) => $context === 'edit')
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make(__('messages.section.external_request_details'))
                ->icon('heroicon-o-wrench-screwdriver')
                ->columns(2)
                ->schema([
                    Textarea::make('technical_description')
                        ->label(__('messages.field.technical_description'))
                        ->required()
                        ->rows(4)
                        ->columnSpanFull()
                        ->placeholder(__('messages.field.technical_description')),

                    TextInput::make('estimated_amount')
                        ->label(__('messages.field.estimated_amount'))
                        ->numeric()
                        ->minValue(0)
                        ->placeholder('0.00'),

                    Textarea::make('required_parts')
                        ->label(__('messages.field.required_parts'))
                        ->rows(3)
                        ->placeholder(__('messages.field.required_parts'))
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make(__('messages.section.status_notes'))
                ->icon('heroicon-o-chat-bubble-left-right')
                ->columns(2)
                ->schema([
                    Select::make('status')
                        ->label(__('messages.field.status'))
                        ->options(ExternalMaintenanceRequest::statusOptions())
                        ->native(false)
                        ->required()
                        ->live()
                        ->default('pending'),

                    TextInput::make('admin_note')
                        ->label(__('messages.field.notes'))
                        ->placeholder(__('messages.field.notes')),

                    Textarea::make('rejection_reason')
                        ->label(__('messages.field.notes'))
                        ->rows(3)
                        ->placeholder(__('messages.field.notes'))
                        ->columnSpanFull()
                        ->visible(fn($get) => $get('status') === 'rejected'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('maintenanceRequest.asset.department.administration.sector.name')
                    ->label(__('messages.field.sector'))
                    ->badge()
                    ->color('gray')
                    ->sortable(),

                TextColumn::make('maintenanceRequest.asset.department.administration.name')
                    ->label(__('messages.field.administration'))
                    ->badge()
                    ->color('info')
                    ->sortable(),

                TextColumn::make('maintenanceRequest.asset.name')
                    ->label(__('messages.field.asset'))
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('maintenanceRequest.employee.name')
                    ->label(__('messages.field.employee'))
                    ->searchable(),

                TextColumn::make('technical_description')
                    ->label(__('messages.field.technical_description'))
                    ->limit(40)
                    ->tooltip(fn($record) => $record->technical_description)
                    ->searchable(),

                TextColumn::make('estimated_amount')
                    ->label(__('messages.field.estimated_amount'))
                    ->money('YER')
                    ->sortable(),

                TextColumn::make('required_parts')
                    ->label(__('messages.field.required_parts'))
                    ->limit(30)
                    ->placeholder('—')
                    ->toggleable(),

                TextColumn::make('status')
                    ->label(__('messages.field.status'))
                    ->badge()
                    ->formatStateUsing(fn($state) => ExternalMaintenanceRequest::statusOptions()[$state] ?? $state)
                    ->color(fn($state) => ExternalMaintenanceRequest::statusColors()[$state] ?? 'gray'),

                TextColumn::make('creator.name')
                    ->label(__('messages.field.by_user'))
                    ->placeholder('—')
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label(__('messages.field.created_at'))
                    ->dateTime('Y/m/d - h:i A')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label(__('messages.field.status'))
                    ->options(ExternalMaintenanceRequest::statusOptions()),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->emptyStateIcon('heroicon-o-arrow-top-right-on-square')
            ->emptyStateHeading(__('messages.empty.no_external_requests'));
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListExternalMaintenanceRequests::route('/'),
            'create' => Pages\CreateExternalMaintenanceRequest::route('/create'),
            'edit'   => Pages\EditExternalMaintenanceRequest::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()
            ->with([
                'maintenanceRequest.asset.department.administration.sector',
                'maintenanceRequest.employee',
                'creator',
            ]);
    }
}
