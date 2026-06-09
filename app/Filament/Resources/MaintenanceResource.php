<?php

namespace App\Filament\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MaintenanceResource\Pages;
use App\Models\Asset;
use App\Models\Maintenance;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class MaintenanceResource extends Resource
{
    protected static ?string $model = Maintenance::class;

    protected static ?string $navigationIcon   = 'heroicon-o-wrench-screwdriver';
    protected static ?int    $navigationSort   = 2;

    public static function getNavigationLabel(): string { return __('messages.resource.maintenances'); }
    public static function getNavigationGroup(): ?string { return __('messages.nav.asset_management'); }
    public static function getModelLabel(): string { return __('messages.resource.maintenance'); }
    public static function getPluralModelLabel(): string { return __('messages.resource.maintenances'); }

    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\Section::make(__('messages.section.maintenance_info'))
                ->icon('heroicon-o-wrench-screwdriver')
                ->columns(2)
                ->schema([
                  Select::make('asset_id')
    ->label(__('messages.field.asset'))
    ->options(function () {
        $userDepartmentIds = auth()->user()
            ->departments()
            ->pluck('departments.id')
            ->toArray();

        return Asset::with('department')
            ->whereIn('department_id', $userDepartmentIds)
            ->get()
            ->mapWithKeys(fn ($asset) => [
                $asset->id => $asset->name . ' — ' . ($asset->department?->name ?? ''),
            ]);
    })
    ->searchable()
    ->preload()
    ->required()
    ->columnSpanFull(),

                    DatePicker::make('maintenance_date')
                        ->label(__('messages.field.maintenance_date'))
                        ->required()
                        ->default(now())
                        ->native(false)
                        ->displayFormat('Y/m/d'),

                    Select::make('status')
                        ->label(__('messages.field.status'))
                        ->options([
                            'Maintenance Completed' => '✅ ' . __('messages.status.completed'),
                            'Postponed'            => '⏳ ' . __('messages.status.postponed'),
                            'Pending'              => '🕐 ' . __('messages.status.pending'),
                        ])
                        ->required()
                        ->default('Maintenance Completed')
                        ->native(false),

                    Textarea::make('note')
                        ->label(__('messages.field.notes'))
                        ->rows(3)
                        ->columnSpanFull()
                        ->placeholder(__('messages.field.notes')),
                ]),



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

                TextColumn::make('asset.department.name')
                    ->label(__('messages.field.department'))
                    ->badge()
                    ->sortable(),

                TextColumn::make('maintenance_date')
                    ->label(__('messages.field.maintenance_date'))
                    ->date('Y/m/d')
                    ->sortable(),

                BadgeColumn::make('status')
                    ->label(__('messages.field.status'))
                    ->colors([
                        'success' => 'Maintenance Completed',
                        'warning' => 'Postponed',
                        'danger'  => 'Pending',
                    ])
                    ->formatStateUsing(fn($state) => match ($state) {
                        'Maintenance Completed' => ' ' . __('messages.status.completed'),
                        'Postponed'            => ' ' . __('messages.status.postponed'),
                        'Pending'              => ' ' . __('messages.status.pending'),
                        default                => $state,
                    }),

                TextColumn::make('note')
                    ->label(__('messages.field.notes'))
                    ->limit(40)
                    ->placeholder('—')
                    ->toggleable(),
            ])
            ->defaultSort('maintenance_date', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label(__('messages.field.status'))
                    ->options([
                        'Maintenance Completed' => __('messages.status.completed'),
                        'Postponed'            => __('messages.status.postponed'),
                        'Pending'              => __('messages.status.pending'),
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->emptyStateIcon('heroicon-o-wrench-screwdriver')
            ->emptyStateHeading(__('messages.empty.no_maintenances'));
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListMaintenances::route('/'),
            'create' => Pages\CreateMaintenance::route('/create'),
            'edit'   => Pages\EditMaintenance::route('/{record}/edit'),
        ];
    }

    // ─── Permissions ─────────────────────────────────────────────────────────

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('عرض الصيانات') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('إنشاء صيانة') ?? false;
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()?->can('تعديل الصيانات') ?? false;
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()?->can('حذف الصيانات') ?? false;
    }

    // ─── Query ───────────────────────────────────────────────────────────────

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        if (!auth()->check()) {
            return $query->whereRaw('0 = 1');
        }

        $userDepartmentIds = auth()->user()
            ->departments()
            ->pluck('departments.id')
            ->toArray();

        if (empty($userDepartmentIds)) {
            return $query->whereRaw('0 = 1');
        }

        return $query->whereHas('asset', function ($q) use ($userDepartmentIds) {
            $q->whereIn('department_id', $userDepartmentIds);
        });
    }
}
