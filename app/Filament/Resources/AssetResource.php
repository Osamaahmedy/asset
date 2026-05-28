<?php

namespace App\Filament\Resources;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AssetResource\Pages;
use App\Models\Asset;
use App\Models\Department;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Models\Employee;
use App\Models\AssetType;

class AssetResource extends Resource
{
    protected static ?string $model = Asset::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'serial_number';

    public static function getNavigationLabel(): string
    {
        return __('messages.resource.assets');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('messages.nav.asset_management');
    }

    public static function getModelLabel(): string
    {
        return __('messages.resource.asset');
    }

    public static function getPluralModelLabel(): string
    {
        return __('messages.resource.assets');
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'serial_number'];
    }

    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\Section::make(__('messages.section.basic_info'))
                ->icon('heroicon-o-information-circle')
                ->columns(2)
                ->schema([
                    TextInput::make('name')
                        ->label(__('messages.field.asset_name'))
                        ->required()
                        ->maxLength(255),

                    Select::make('vendor_id')
                        ->label(__('messages.field.vendor'))
                        ->relationship('vendor', 'name')
                        ->searchable()
                        ->preload()
                        ->nullable(),

                    Select::make('location_id')
                        ->label(__('messages.field.location'))
                        ->relationship('location', 'name')
                        ->searchable()
                        ->preload()
                        ->nullable(),

                    Select::make('status')
                        ->label(__('messages.field.status'))
                        ->options(\App\Models\Asset::getStatuses())
                        ->default(\App\Models\Asset::STATUS_AVAILABLE)
                        ->required(),

                    TextInput::make('price')
                        ->label(__('messages.field.price'))
                        ->numeric()
                        ->required()
                        ->prefix('$'),

                    Select::make('department_id')
                        ->label(__('messages.field.department'))
                        ->required()
                        ->options(function () {
                            return auth()->user()
                                ->departments()
                                ->pluck('departments.name', 'departments.id')
                                ->toArray();
                        })
                        ->preload()
                        ->searchable(),

                    Select::make('employee_id')
                        ->label(__('messages.field.employee'))
                        ->options(function (Forms\Get $get) {
                            $deptId = $get('department_id');
                            $query = Employee::with('department');
                            if ($deptId) {
                                $query->where('department_id', $deptId);
                            }
                            return $query->get()
                                ->mapWithKeys(fn($emp) => [
                                    $emp->id => "{$emp->name} — {$emp->department?->name}"
                                ]);
                        })
                        ->searchable()
                        ->nullable()
                        ->placeholder(__('messages.field.employee')),
                ]),

            Forms\Components\ToggleButtons::make('is_personal')
                ->label(__('messages.field.is_personal'))
                ->options([
                    false => __('messages.field.ministry'),
                    true  => __('messages.field.personal'),
                ])
                ->default(false)
                ->inline()
                ->required()
                ->colors([
                    'danger'  => __('messages.field.personal'),
                    'success' => __('messages.field.ministry'),
                ]),

            Forms\Components\Section::make(__('messages.section.dates_maintenance'))
                ->icon('heroicon-o-calendar')
                ->columns(2)
                ->schema([
                    DatePicker::make('purchase_date')
                        ->label(__('messages.field.purchase_date'))
                        ->required()
                        ->default(now())
                        ->native(false)
                        ->displayFormat('Y/m/d'),

                    TextInput::make('maintenance_cycle_months')
                        ->label(__('messages.field.maintenance_cycle'))
                        ->numeric()
                        ->required()
                        ->default(3)
                        ->suffix(__('messages.field.maintenance_cycle')),

                    TextInput::make('warranty_months')
                        ->label(__('messages.field.warranty'))
                        ->numeric()
                        ->nullable()
                        ->suffix(__('messages.field.warranty')),

                    DatePicker::make('warranty_start_date')
                        ->label(__('messages.field.warranty_start'))
                        ->nullable()
                        ->native(false)
                        ->displayFormat('Y/m/d'),

                    TextInput::make('useful_life_years')
                        ->label(__('messages.field.useful_life'))
                        ->numeric()
                        ->nullable()
                        ->suffix(__('messages.field.useful_life')),

                    Forms\Components\Placeholder::make('current_book_value_display')
                        ->label(__('messages.field.book_value'))
                        ->content(function (?Asset $record) {
                            if (!$record) return 'يتم حسابها بعد الحفظ';
                            $val = $record->current_book_value;
                            return $val !== null ? number_format($val, 2) . ' $' : 'البيانات غير مكتملة للحساب';
                        }),

                    DatePicker::make('maintenance_due_date')
                        ->label(__('messages.field.maintenance_due'))
                        ->required()
                        ->default(now()->addMonths(3))
                        ->native(false)
                        ->displayFormat('Y/m/d'),

                    DatePicker::make('last_maintenance_date')
                        ->label(__('messages.field.last_maintenance'))
                        ->required()
                        ->default(now())
                        ->native(false)
                        ->displayFormat('Y/m/d'),
                ]),

            Forms\Components\Section::make(__('messages.section.asset_classification'))
                ->icon('heroicon-o-tag')
                ->schema([
                    Select::make('asset_type_id')
                        ->label(__('messages.field.asset_type'))
                        ->relationship('assetType', 'name')
                        ->searchable()
                        ->preload()
                        ->required()
                        ->createOptionForm([
                            TextInput::make('name')
                                ->label(__('messages.field.name'))
                                ->required()
                                ->maxLength(255),
                        ])
                        ->placeholder(__('messages.field.asset_type')),
                ]),

            
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('messages.field.asset_name'))
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('serial_number')
                    ->label(__('messages.field.serial_number'))
                    ->copyable()
                    ->copyMessage('تم النسخ!')
                    ->placeholder('—'),

                TextColumn::make('vendor.name')
                    ->label(__('messages.field.vendor'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('location.name')
                    ->label(__('messages.field.location'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('price')
                    ->label(__('messages.field.price'))
                    ->money('USD')
                    ->sortable(),

                TextColumn::make('current_book_value')
                    ->label(__('messages.field.book_value'))
                    ->money('USD')
                    ->sortable()
                    ->getStateUsing(fn ($record) => $record->current_book_value),

                TextColumn::make('department.name')
                    ->label(__('messages.field.office'))
                    ->badge()
                    ->sortable(),

                TextColumn::make('employee.name')
                    ->label(__('messages.field.employee'))
                    ->searchable()
                    ->badge()
                    ->color('warning')
                    ->default('—'),

                TextColumn::make('status')
                    ->label(__('messages.field.status'))
                    ->badge()
                    ->formatStateUsing(fn ($state) => match($state) {
                        \App\Models\Asset::STATUS_AVAILABLE => __('messages.asset_status.available'),
                        \App\Models\Asset::STATUS_IN_USE => __('messages.asset_status.in_use'),
                        \App\Models\Asset::STATUS_MAINTENANCE => __('messages.asset_status.maintenance'),
                        \App\Models\Asset::STATUS_DAMAGED => __('messages.asset_status.damaged'),
                        default => $state,
                    })
                    ->color(fn ($state) => match($state) {
                        \App\Models\Asset::STATUS_AVAILABLE => 'success',
                        \App\Models\Asset::STATUS_IN_USE => 'warning',
                        \App\Models\Asset::STATUS_DAMAGED => 'danger',
                        \App\Models\Asset::STATUS_MAINTENANCE => 'primary',
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('is_personal')
                    ->label(__('messages.field.is_personal'))
                    ->badge()
                    ->formatStateUsing(fn (bool $state): string => $state ? __('messages.field.personal') : __('messages.field.ministry'))
                    ->color(fn (bool $state) => $state ? 'warning' : 'success')
                    ->sortable(),

                TextColumn::make('assetType.name')
                    ->label(__('messages.field.asset_type'))
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('warning')
                    ->default('—'),

                TextColumn::make('purchase_date')
                    ->label(__('messages.field.purchase_date'))
                    ->date('Y/m/d')
                    ->sortable(),

                TextColumn::make('last_maintenance_date')
                    ->label(__('messages.field.last_maintenance'))
                    ->date('Y/m/d')
                    ->sortable(),

                TextColumn::make('maintenance_status')
                    ->label(__('messages.field.status'))
                    ->badge()
                    ->formatStateUsing(fn($state) => match($state) {
                        '❓ Unknown'               => __('messages.maintenance_status.unknown'),
                        '❌ Overdue'               => __('messages.maintenance_status.overdue'),
                        '⚠️ Less than a week'     => __('messages.maintenance_status.less_than_week'),
                        '⚠️ Less than a month'    => __('messages.maintenance_status.less_than_month'),
                        '🔔 Less than two months' => __('messages.maintenance_status.less_than_two_months'),
                        '✅ Good'                  => __('messages.maintenance_status.good'),
                        default                    => $state,
                    })
                    ->color(fn($state) => match(true) {
                        $state === '❌ Overdue' => 'danger',
                        str_contains($state, '⚠️') || str_contains($state, '🔔') => 'warning',
                        $state === '✅ Good' => 'success',
                        default => 'gray',
                    }),

                TextColumn::make('deletion_status')
                    ->label(__('messages.resource.deletion_request'))
                    ->badge()
                    ->getStateUsing(fn($record) => $record->deletionConfirmation
                        ? __('messages.status.pending')
                        : __('messages.action.no'))
                    ->color(fn($state) => match(true) {
                        $state === __('messages.status.pending') => 'warning',
                        default => 'success',
                    }),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label(__('messages.field.status'))
                    ->options(\App\Models\Asset::getStatuses()),

                Tables\Filters\SelectFilter::make('department_id')
                    ->label(__('messages.field.department'))
                    ->relationship('department', 'name'),

                Tables\Filters\SelectFilter::make('asset_type_id')
                    ->label(__('messages.field.asset_type'))
                    ->relationship('assetType', 'name'),

                Tables\Filters\SelectFilter::make('vendor_id')
                    ->label(__('messages.field.vendor'))
                    ->relationship('vendor', 'name'),

                Tables\Filters\TernaryFilter::make('is_personal')
                    ->label(__('messages.field.is_personal')),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label(__('messages.action.view')),

                Tables\Actions\EditAction::make()
                    ->label(__('messages.action.edit')),

                Tables\Actions\Action::make('requestDeletion')
                    ->label(__('messages.action.request_deletion'))
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading(__('messages.action.request_deletion'))
                    ->modalDescription(__('messages.action.confirm_request_deletion'))
                    ->modalSubmitActionLabel(__('messages.action.confirm'))
                    ->modalCancelActionLabel(__('messages.action.cancel'))
                    ->visible(fn(Asset $record) => !$record->deletionConfirmation)
                    ->action(function (Asset $record) {
                        \App\Models\AssetDeletionConfirmation::create([
                            'asset_id'     => $record->id,
                            'is_confirmed' => false,
                            'requested_by' => auth()->id(),
                        ]);

                        \Filament\Notifications\Notification::make()
                            ->title(__('messages.action.request_deletion'))
                            ->body(__('messages.action.request_deletion_success'))
                            ->success()
                            ->send();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label(__('messages.action.delete_selected')),
                    \pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction::make()
                        ->label(__('messages.action.export_selected'))
                        ->color('success')
                        ->icon('heroicon-o-document-arrow-down')
                        ->exports([
                            \pxlrbt\FilamentExcel\Exports\ExcelExport::make()
                                ->withFilename('تقرير_الأصول_المحددة_' . date('Y-m-d'))
                                ->modifyQueryUsing(fn ($query) => $query->with(['maintenances', 'employee', 'department', 'location', 'vendor', 'assetType']))
                                ->withColumns([
                                    \pxlrbt\FilamentExcel\Columns\Column::make('name')->heading('اسم الأصل'),
                                    \pxlrbt\FilamentExcel\Columns\Column::make('serial_number')->heading('الرقم التسلسلي'),
                                    \pxlrbt\FilamentExcel\Columns\Column::make('employee.name')->heading('اسم المالك (الموظف)'),
                                    \pxlrbt\FilamentExcel\Columns\Column::make('department.name')->heading('القسم / المكتب'),
                                    \pxlrbt\FilamentExcel\Columns\Column::make('location.name')->heading('الموقع'),
                                    \pxlrbt\FilamentExcel\Columns\Column::make('vendor')
                                        ->heading('المورد')
                                        ->formatStateUsing(fn ($state, $record) => $record->vendor?->name ?? 'لا يوجد'),
                                    \pxlrbt\FilamentExcel\Columns\Column::make('price')->heading('السعر'),
                                    \pxlrbt\FilamentExcel\Columns\Column::make('purchase_date')->heading('تاريخ الشراء'),
                                    \pxlrbt\FilamentExcel\Columns\Column::make('salvage_value')->heading('القيمة التخريدية'),
                                    \pxlrbt\FilamentExcel\Columns\Column::make('useful_life_years')->heading('العمر الافتراضي'),
                                    \pxlrbt\FilamentExcel\Columns\Column::make('current_book_value')
                                        ->heading('القيمة الحالية الدفترية')
                                        ->formatStateUsing(fn ($state, $record) => $record->current_book_value !== null ? number_format($record->current_book_value, 2) : 'بيانات غير مكتملة'),
                                    \pxlrbt\FilamentExcel\Columns\Column::make('assetType.name')->heading('نوع الأصل'),
                                    \pxlrbt\FilamentExcel\Columns\Column::make('status')->heading('الحالة'),
                                    \pxlrbt\FilamentExcel\Columns\Column::make('is_personal')
                                        ->heading('الملكية')
                                        ->formatStateUsing(fn ($state) => $state ? 'شخصي' : 'جهة العمل'),
                                    \pxlrbt\FilamentExcel\Columns\Column::make('id')
                                        ->heading('سجل الصيانات وتفاصيلها')
                                        ->formatStateUsing(function ($state, $record) {
                                            if (!$record->maintenances || $record->maintenances->isEmpty()) {
                                                return 'لا يوجد صيانات مسجلة';
                                            }
                                            return $record->maintenances->map(function ($m) {
                                                $cost = $m->cost ? "بتكلفة {$m->cost}" : 'بدون تكلفة';
                                                return "[تاريخ: {$m->maintenance_date} | {$cost}] - التفاصيل: {$m->description}";
                                            })->join('  ||  ');
                                        }),
                                ])
                        ]),
                    Tables\Actions\BulkAction::make('print_barcodes')
                        ->label(__('messages.action.print_barcodes'))
                        ->icon('heroicon-o-printer')
                        ->color('primary')
                        ->action(function (\Illuminate\Database\Eloquent\Collection $records, $livewire) {
                            $url = route('assets.print-barcodes', ['ids' => $records->pluck('id')->join(',')]);
                            $livewire->js("window.open('{$url}', '_blank');");
                        }),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListAssets::route('/'),
            'create' => Pages\CreateAsset::route('/create'),
            'view'   => Pages\ViewAsset::route('/{record}'),
            'edit'   => Pages\EditAsset::route('/{record}/edit'),
        ];
    }

    // ─── Permissions ────────────────────────────────────────────────────────────

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('عرض الأصول') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('إنشاء الأصول') ?? false;
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()?->can('تعديل الأصول') ?? false;
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()?->can('حذف الأصول') ?? false;
    }

    // ─── Query with Eager Loading ──────────────────────────────────────────────

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

        return $query
            ->whereIn('department_id', $userDepartmentIds)
            ->with([
                'department',
                'employee',
                'assetType',
                'vendor',
                'location',
                'deletionConfirmation',
            ]);
    }
}
