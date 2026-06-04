<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetHandoverResource\Pages;
use App\Models\AssetHandover;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AssetHandoverResource extends Resource
{
    protected static ?string $model = AssetHandover::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-check';

    public static function getNavigationLabel(): string { return __('messages.resource.asset_handovers'); }
    public static function getNavigationGroup(): ?string { return __('messages.nav.asset_management'); }
    public static function getModelLabel(): string { return __('messages.resource.asset_handover'); }
    public static function getPluralModelLabel(): string { return __('messages.resource.asset_handovers'); }

    protected static function conditionOptions(): array
    {
        return [
            'new'          => __('messages.condition.new'),
            'excellent'    => __('messages.condition.excellent'),
            'good'         => __('messages.condition.good'),
            'acceptable'   => __('messages.condition.acceptable'),
            'damaged'      => __('messages.condition.damaged'),
            'needs_repair' => __('messages.condition.needs_repair'),
        ];
    }

    protected static function conditionColor(?string $state): string
    {
        return match ($state) {
            'new'                        => 'primary',
            'excellent', 'good'          => 'success',
            'acceptable', 'needs_repair' => 'warning',
            'damaged'                    => 'danger',
            default                      => 'gray',
        };
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                // ── المعلومات الأساسية ──────────────────────────────────────
                Forms\Components\Section::make(__('messages.section.basic_info'))
                    ->icon('heroicon-o-information-circle')
                    ->columns(2)
                    ->schema([

                        Forms\Components\Select::make('action_type')
                            ->label(__('messages.field.action_type'))
                            ->options([
                                'handover' => __('messages.action.handover'),
                                'return'   => __('messages.action.return'),
                            ])
                            ->required()
                            ->live()
                            ->native(false)
                            ->columnSpanFull()
                            ->afterStateUpdated(fn (Forms\Set $set) => $set('asset_id', null)),

                        Forms\Components\Select::make('asset_id')
                            ->label(__('messages.field.asset'))
                            ->relationship(
                                name: 'asset',
                                titleAttribute: 'name',
                                modifyQueryUsing: function (Builder $query, Get $get, ?\App\Models\AssetHandover $record) {
                                    $userDepartmentIds = auth()->user()
                                        ->departments()
                                        ->pluck('departments.id')
                                        ->toArray();
                                    $query->whereIn('department_id', $userDepartmentIds);

                                    if ($get('action_type') === 'handover') {
                                        // استلام: عرض الأصول المتاحة فقط + الأصل الحالي في حالة التعديل
                                        $query->where(function ($q) use ($record) {
                                            $q->where('status', \App\Models\Asset::STATUS_AVAILABLE);
                                            if ($record) {
                                                $q->orWhere('id', $record->asset_id);
                                            }
                                        });
                                    } elseif ($get('action_type') === 'return') {
                                        // إرجاع: عرض الأصول في العهدة فقط + الأصل الحالي في حالة التعديل
                                        $query->where(function ($q) use ($record) {
                                            $q->where('status', \App\Models\Asset::STATUS_IN_USE);
                                            if ($record) {
                                                $q->orWhere('id', $record->asset_id);
                                            }
                                        });
                                    }

                                    return $query;
                                }
                            )
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live()
                            ->afterStateUpdated(function (Forms\Set $set, Get $get, $state) {
                                if ($get('action_type') === 'return' && $state) {
                                    // عند الإرجاع: تعبئة الموظف تلقائياً من الأصل
                                    $asset = \App\Models\Asset::find($state);
                                    if ($asset && $asset->employee_id) {
                                        $set('employee_id', $asset->employee_id);
                                    }
                                }
                            })
                            ->columnSpan(1),

                        Forms\Components\Select::make('employee_id')
                            ->label(__('messages.field.employee'))
                            ->relationship('employee', 'name')
                            ->searchable()
                            ->preload()
                            ->required(fn (Get $get): bool => $get('action_type') === 'handover')
                            ->visible(fn (Get $get): bool => $get('action_type') === 'handover')
                            ->columnSpan(1),

                    ]),

                // ── قسم الاستلام ────────────────────────────────────────────
                Forms\Components\Section::make(__('messages.section.handover_details'))
                    ->icon('heroicon-o-arrow-down-tray')
                    ->columns(2)
                    ->visible(fn (Get $get): bool => $get('action_type') === 'handover')
                    ->schema([

                        Forms\Components\DatePicker::make('handed_over_at')
                            ->label(__('messages.field.handed_over_at'))
                            ->required(fn (Get $get): bool => $get('action_type') === 'handover')
                            ->default(now())
                            ->columnSpan(1),

                        Forms\Components\Select::make('condition_on_handover')
                            ->label(__('messages.field.condition_on_handover'))
                            ->options(self::conditionOptions())
                            ->required(fn (Get $get): bool => $get('action_type') === 'handover')
                            ->native(false)
                            ->columnSpan(1),

                        Forms\Components\Textarea::make('handover_notes')
                            ->label(__('messages.field.handover_notes'))
                            ->rows(3)
                            ->columnSpanFull(),

                    ]),

                // ── قسم الإرجاع ─────────────────────────────────────────────
                Forms\Components\Section::make(__('messages.section.return_details'))
                    ->icon('heroicon-o-arrow-up-tray')
                    ->columns(2)
                    ->visible(fn (Get $get): bool => $get('action_type') === 'return')
                    ->schema([

                        Forms\Components\DatePicker::make('returned_at')
                            ->label(__('messages.field.returned_at'))
                            ->required(fn (Get $get): bool => $get('action_type') === 'return')
                            ->default(now())
                            ->after('handed_over_at')
                            ->columnSpan(1),

                        Forms\Components\Select::make('condition_on_return')
                            ->label(__('messages.field.condition_on_return'))
                            ->options(self::conditionOptions())
                            ->required(fn (Get $get): bool => $get('action_type') === 'return')
                            ->native(false)
                            ->columnSpan(1),

                        Forms\Components\Textarea::make('return_notes')
                            ->label(__('messages.field.return_notes'))
                            ->rows(3)
                            ->columnSpanFull(),

                    ]),

                // ── ملاحظات عامة ────────────────────────────────────────────
                Forms\Components\Section::make(__('messages.section.general_notes'))
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->collapsed()
                    ->schema([
                        Forms\Components\Textarea::make('notes')
                            ->label(__('messages.field.notes'))
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('asset.name')
                    ->label(__('messages.field.asset'))
                    ->searchable()
                    ->sortable()
                    ->weight('semibold'),

                Tables\Columns\TextColumn::make('employee.name')
                    ->label(__('messages.field.employee'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('action_type')
                    ->label(__('messages.field.action_type'))
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'handover' => __('messages.action.handover'),
                        'return'   => __('messages.action.return'),
                        default    => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'handover' => 'warning',
                        'return'   => 'success',
                        default    => 'gray',
                    })
                    ->icon(fn (string $state): string => match ($state) {
                        'handover' => 'heroicon-o-arrow-down-tray',
                        'return'   => 'heroicon-o-arrow-up-tray',
                        default    => '',
                    }),

                Tables\Columns\TextColumn::make('handed_over_at')
                    ->label(__('messages.field.handed_over_at'))
                    ->date('Y/m/d')
                    ->sortable()
                    ->placeholder('—'),

                Tables\Columns\TextColumn::make('returned_at')
                    ->label(__('messages.field.returned_at'))
                    ->date('Y/m/d')
                    ->sortable()
                    ->placeholder('—'),

                Tables\Columns\BadgeColumn::make('condition_on_handover')
                    ->label(__('messages.field.condition_on_handover'))
                    ->formatStateUsing(fn (?string $state): string => $state
                        ? __('messages.condition.' . $state) : '—')
                    ->color(fn (?string $state): string => self::conditionColor($state))
                    ->toggleable(),

                Tables\Columns\BadgeColumn::make('condition_on_return')
                    ->label(__('messages.field.condition_on_return'))
                    ->formatStateUsing(fn (?string $state): string => $state
                        ? __('messages.condition.' . $state) : '—')
                    ->color(fn (?string $state): string => self::conditionColor($state))
                    ->toggleable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([

                Tables\Filters\SelectFilter::make('action_type')
                    ->label(__('messages.field.action_type'))
                    ->options([
                        'handover' => __('messages.action.handover'),
                        'return'   => __('messages.action.return'),
                    ]),

                Tables\Filters\Filter::make('active')
                    ->label(__('messages.filter.active_handovers'))
                    ->query(fn (Builder $query) => $query->whereNull('returned_at')),

                Tables\Filters\Filter::make('returned')
                    ->label(__('messages.filter.returned'))
                    ->query(fn (Builder $query) => $query->whereNotNull('returned_at')),

                Tables\Filters\SelectFilter::make('condition_on_handover')
                    ->label(__('messages.field.condition_on_handover'))
                    ->options(self::conditionOptions()),

            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index'  => Pages\ListAssetHandovers::route('/'),
            'create' => Pages\CreateAssetHandover::route('/create'),
            'edit'   => Pages\EditAssetHandover::route('/{record}/edit'),
        ];
    }
}
