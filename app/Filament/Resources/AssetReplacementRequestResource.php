<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetReplacementRequestResource\Pages;
use App\Models\AssetReplacementRequest;
use App\Models\Location;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Hidden;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;

class AssetReplacementRequestResource extends Resource
{
    protected static ?string $model = AssetReplacementRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-path';
    protected static ?int $navigationSort = 4;

    public static function getNavigationLabel(): string { return __('messages.resource.asset_replacement_requests'); }
    public static function getNavigationGroup(): ?string { return __('messages.nav.asset_management'); }
    public static function getModelLabel(): string { return __('messages.resource.asset_replacement_request'); }
    public static function getPluralModelLabel(): string { return __('messages.resource.asset_replacement_requests'); }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('replacement_tabs')
                    ->columnSpanFull()
                    ->tabs([
                        Forms\Components\Tabs\Tab::make(__('messages.replacement.section.request_details'))
                            ->icon('heroicon-o-clipboard-document-list')
                            ->columns(2)
                            ->schema([
                                Hidden::make('requester_id')
                                    ->default(auth()->id()),

                                Forms\Components\Placeholder::make('requester_placeholder')
                                    ->label(__('messages.replacement.field.requester'))
                                    ->content(fn ($record) => $record?->requester?->name ?? auth()->user()->name),

                                Select::make('asset_id')
                                    ->label(__('messages.field.asset'))
                                    ->relationship(
                                        name: 'asset',
                                        titleAttribute: 'name',
                                        modifyQueryUsing: function (Builder $query) {
                                            $userDepartmentIds = auth()->user()
                                                ->departments()
                                                ->pluck('departments.id')
                                                ->toArray();
                                            return $query->whereIn('department_id', $userDepartmentIds);
                                        }
                                    )
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->live(),

                                Select::make('reason')
                                    ->label(__('messages.replacement.field.reason'))
                                    ->options([
                                        'completely_damaged' => __('messages.replacement.reason.completely_damaged'),
                                        'expired' => __('messages.replacement.reason.expired'),
                                        'other' => __('messages.replacement.reason.other'),
                                    ])
                                    ->native(false)
                                    ->required()
                                    ->live(),

                                Select::make('target_location_id')
                                    ->label(__('messages.replacement.field.target_location'))
                                    ->relationship('targetLocation', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->columnSpanFull(),

                                Textarea::make('description')
                                    ->label(__('messages.replacement.field.other_reason'))
                                    ->rows(4)
                                    ->columnSpanFull()
                                    ->visible(fn (Forms\Get $get) => $get('reason') === 'other')
                                    ->required(fn (Forms\Get $get) => $get('reason') === 'other'),

                                Textarea::make('notes')
                                    ->label(__('messages.replacement.field.notes'))
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make(__('messages.resource.asset'))
                            ->icon('heroicon-o-cube')
                            ->columns(2)
                            ->schema([
                                Forms\Components\Placeholder::make('asset_name_placeholder')
                                    ->label(__('messages.field.asset_name'))
                                    ->content(fn (Forms\Get $get) => \App\Models\Asset::find($get('asset_id'))?->name ?? '—'),

                                Forms\Components\Placeholder::make('asset_serial_placeholder')
                                    ->label(__('messages.field.serial_number'))
                                    ->content(fn (Forms\Get $get) => \App\Models\Asset::find($get('asset_id'))?->serial_number ?? '—'),

                                Forms\Components\Placeholder::make('asset_location_placeholder')
                                    ->label(__('messages.field.location'))
                                    ->content(fn (Forms\Get $get) => \App\Models\Asset::find($get('asset_id'))?->location?->name ?? '—'),

                                Forms\Components\Placeholder::make('asset_price_placeholder')
                                    ->label(__('messages.field.price'))
                                    ->content(fn (Forms\Get $get) => ($price = \App\Models\Asset::find($get('asset_id'))?->price) !== null ? number_format($price, 2) . ' $' : '—'),

                                Forms\Components\Placeholder::make('asset_status_placeholder')
                                    ->label(__('messages.field.status'))
                                    ->content(fn (Forms\Get $get) => \App\Models\Asset::find($get('asset_id'))?->status ?? '—'),

                                Forms\Components\Placeholder::make('asset_department_placeholder')
                                    ->label(__('messages.field.department'))
                                    ->content(fn (Forms\Get $get) => \App\Models\Asset::find($get('asset_id'))?->department?->name ?? '—'),
                            ])
                    ]),

                Forms\Components\Section::make(__('messages.replacement.section.decision_details'))
                    ->visible(fn ($record) => $record && $record->status !== 'pending')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Placeholder::make('status_placeholder')
                            ->label(__('messages.field.status'))
                            ->content(fn ($record) => match ($record?->status) {
                                'approved' => '✅ ' . __('messages.replacement.status.approved'),
                                'rejected' => '❌ ' . __('messages.replacement.status.rejected'),
                                default => '—',
                            }),

                        Forms\Components\Placeholder::make('approver_placeholder')
                            ->label('الموظف المسؤول عن القرار')
                            ->content(fn ($record) => $record?->approver?->name ?? '—'),

                        Forms\Components\Placeholder::make('actioned_at_placeholder')
                            ->label(__('messages.replacement.field.actioned_at'))
                            ->content(fn ($record) => $record?->actioned_at?->format('Y/m/d H:i') ?? '—'),

                        Forms\Components\Placeholder::make('rejection_reason_placeholder')
                            ->label(__('messages.replacement.field.rejection_reason'))
                            ->content(fn ($record) => $record?->rejection_reason ?? '—')
                            ->columnSpanFull()
                            ->visible(fn ($record) => $record?->status === 'rejected'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('asset.name')
                    ->label(__('messages.field.asset'))
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('asset.serial_number')
                    ->label(__('messages.field.serial_number'))
                    ->searchable(),

                TextColumn::make('requester.name')
                    ->label(__('messages.replacement.field.requester'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('reason')
                    ->label(__('messages.replacement.field.reason'))
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'completely_damaged' => __('messages.replacement.reason.completely_damaged'),
                        'expired' => __('messages.replacement.reason.expired'),
                        'other' => __('messages.replacement.reason.other'),
                        default => $state,
                    }),

                TextColumn::make('targetLocation.name')
                    ->label(__('messages.replacement.field.target_location')),

                TextColumn::make('description')
                    ->label(__('messages.field.description'))
                    ->limit(20)
                    ->toggleable()
                    ->placeholder('—'),

                TextColumn::make('notes')
                    ->label(__('messages.replacement.field.notes'))
                    ->limit(20)
                    ->toggleable()
                    ->placeholder('—'),

                BadgeColumn::make('status')
                    ->label(__('messages.field.status'))
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'pending' => '🕐 ' . __('messages.replacement.status.pending'),
                        'approved' => '✅ ' . __('messages.replacement.status.approved'),
                        'rejected' => '❌ ' . __('messages.replacement.status.rejected'),
                        default => $state,
                    })
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'approved',
                        'danger' => 'rejected',
                    ]),

                TextColumn::make('actioned_at')
                    ->label(__('messages.replacement.field.actioned_at'))
                    ->dateTime('Y/m/d H:i')
                    ->sortable()
                    ->placeholder('—'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label(__('messages.field.status'))
                    ->options([
                        'pending' => __('messages.replacement.status.pending'),
                        'approved' => __('messages.replacement.status.approved'),
                        'rejected' => __('messages.replacement.status.rejected'),
                    ]),
            ])
            ->actions([
                Action::make('approve')
                    ->label(__('messages.replacement.action.approve'))
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->visible(fn ($record) => $record->status === 'pending')
                    ->requiresConfirmation()
                    ->modalHeading(__('messages.replacement.action.approve'))
                    ->modalDescription(__('messages.replacement.action.approve_confirm'))
                    ->action(function ($record) {
                        $record->update([
                            'status' => 'approved',
                            'approver_id' => auth()->id(),
                            'actioned_at' => now(),
                        ]);

                        Notification::make()
                            ->title(__('messages.profile.saved'))
                            ->success()
                            ->send();
                    }),

                Action::make('reject')
                    ->label(__('messages.replacement.action.reject'))
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(fn ($record) => $record->status === 'pending')
                    ->modalHeading(__('messages.replacement.action.reject'))
                    ->modalWidth('lg')
                    ->form([
                        Textarea::make('rejection_reason')
                            ->label(__('messages.replacement.field.rejection_reason'))
                            ->required()
                            ->rows(3),
                    ])
                    ->action(function ($record, array $data) {
                        $record->update([
                            'status' => 'rejected',
                            'rejection_reason' => $data['rejection_reason'],
                            'approver_id' => auth()->id(),
                            'actioned_at' => now(),
                        ]);

                        Notification::make()
                            ->title(__('messages.profile.saved'))
                            ->success()
                            ->send();
                    }),

                Action::make('print_report')
                    ->label(__('messages.action.print_report'))
                    ->icon('heroicon-o-printer')
                    ->color('info')
                    ->url(fn ($record) => route('replacement.report.export', $record->id))
                    ->openUrlInNewTab(),

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        $userDepartmentIds = auth()->user()
            ->departments()
            ->pluck('departments.id')
            ->toArray();

        return parent::getEloquentQuery()
            ->whereHas('asset', function (Builder $query) use ($userDepartmentIds) {
                $query->whereIn('department_id', $userDepartmentIds);
            });
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssetReplacementRequests::route('/'),
            'create' => Pages\CreateAssetReplacementRequest::route('/create'),
            'edit' => Pages\EditAssetReplacementRequest::route('/{record}/edit'),
        ];
    }
}
