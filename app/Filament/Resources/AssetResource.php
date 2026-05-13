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
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Models\Employee;
use App\Models\AssetType;
class AssetResource extends Resource
{
    protected static ?string $model = Asset::class;

    protected static ?string $navigationLabel = 'الأصول';
    protected static ?string $pluralModelLabel = 'الأصول';
    protected static ?string $modelLabel = 'أصل';
    protected static ?string $navigationGroup = 'إدارة الأصول';
    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\Section::make('المعلومات الأساسية')
                ->icon('heroicon-o-information-circle')
                ->columns(2)
                ->schema([
                    TextInput::make('name')
                        ->label('اسم الأصل')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('vendor')
                        ->label('المورّد')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('price')
                        ->label('السعر')
                        ->numeric()
                        ->required()
                        ->prefix('$'),

                    Select::make('department_id')
                        ->label('القسم')
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
                        ->label('الموظف المسؤول')
                        ->options(function () {
                            return Employee::with('department')
                                ->get()
                                ->mapWithKeys(fn($emp) => [
                                    $emp->id => "{$emp->name} — {$emp->department?->name}"
                                ]);
                        })
                        ->searchable()
                        ->nullable()
                        ->placeholder('اختر الموظف (اختياري)'),
                                    ]),
                    Forms\Components\ToggleButtons::make('is_personal')
                       ->label('ملكية الأصل')
                       ->options([
                           false => 'تابع للوزارة',
                           true  => 'شخصي',
                       ])
                       ->default(false)
                       ->inline()
                       ->required()
                       ->colors([
                                              'danger'  => 'شخصي',
                           'success' => 'تابع للوزارة',
                       ]),

            Forms\Components\Section::make('التواريخ والصيانة')
                ->icon('heroicon-o-calendar')
                ->columns(2)
                ->schema([
                    DatePicker::make('purchase_date')
                        ->label('تاريخ الشراء')
                        ->required()
                        ->default(now())
                        ->native(false)
                        ->displayFormat('Y/m/d'),

                    TextInput::make('maintenance_cycle_months')
                        ->label('دورة الصيانة (بالأشهر)')
                        ->numeric()
                        ->required()
                        ->default(3)
                        ->suffix('أشهر'),

                    DatePicker::make('maintenance_due_date')
                        ->label('تاريخ الصيانة الأولى')
                        ->required()
                        ->default(now()->addMonths(3))
                        ->native(false)
                        ->displayFormat('Y/m/d'),

                    DatePicker::make('last_maintenance_date')
                        ->label('تاريخ آخر صيانة')
                        ->required()
                        ->default(now())
                        ->native(false)
                        ->displayFormat('Y/m/d'),
                ]),

            Forms\Components\Section::make('تصنيف الأصل')
              ->icon('heroicon-o-tag')
               ->schema([
                   Select::make('asset_type_id')
                        ->label('نوع الأصل')
                        ->relationship('assetType', 'name')
                      ->searchable()
                         ->preload()
                       ->required()
                         ->createOptionForm([
                            TextInput::make('name')
                                ->label('اسم النوع')
                               ->required()
                              ->maxLength(255),
                      ])
                      ->placeholder('اختر نوع الأصل'),
                 ]),



        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('اسم الأصل')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('serial_number')
                    ->label('الرقم التسلسلي')
                    ->copyable()
                    ->copyMessage('تم النسخ!')
                    ->placeholder('—'),

                TextColumn::make('vendor')
                    ->label('المورّد')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('price')
                    ->label('السعر')
                    ->money('USD')
                    ->sortable(),

                TextColumn::make('department.name')
                    ->label('المكتب')
                    ->badge()
                    ->sortable(),
                TextColumn::make('employee.name')
                    ->label('الموظف المسؤول')
                    ->searchable()
                    ->badge()
                    ->color('warning')
                    ->default('—'),
                BadgeColumn::make('is_personal')
                    ->label('ملكية الأصل')
                    ->formatStateUsing(fn (bool $state): string => $state ? 'شخصي' : 'تابع للوزارة')
                    ->colors([
                        'warning' => fn (bool $state): bool => $state,
                        'success' => fn (bool $state): bool => !$state,
                    ])
                    ->sortable(),
                TextColumn::make('assetType.name')
                    ->label('نوع الأصل')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('warning')
                    ->default('—'),

                TextColumn::make('purchase_date')
                    ->label('تاريخ الشراء')
                    ->date('Y/m/d')
                    ->sortable(),

                TextColumn::make('last_maintenance_date')
                    ->label('آخر صيانة')
                    ->date('Y/m/d')
                    ->sortable(),

                BadgeColumn::make('maintenance_status')
                    ->label('حالة الصيانة')
                    ->colors([
                        'danger'  => fn($state): bool => $state === '❌ Overdue',
                        'warning' => fn($state): bool => str_contains($state, '⚠️'),
                        'success' => fn($state): bool => $state === '✅ Good',
                    ]),

                BadgeColumn::make('deletion_status')
                    ->label('حالة الحذف')
                    ->getStateUsing(fn($record) => $record->deletionConfirmation
                        ? 'بانتظار التأكيد'
                        : 'لا يوجد')
                    ->colors([
                        'warning' => 'بانتظار التأكيد',
                        'success' => 'لا يوجد',
                    ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('تعديل'),

                Tables\Actions\Action::make('requestDeletion')
                    ->label('طلب حذف')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('طلب حذف الأصل')
                    ->modalDescription('هل أنت متأكد من إرسال طلب حذف هذا الأصل؟ سيتم مراجعته من قِبل المسؤول.')
                    ->modalSubmitActionLabel('نعم، أرسل الطلب')
                    ->modalCancelActionLabel('إلغاء')
                    ->visible(fn(Asset $record) => !$record->deletionConfirmation)
                    ->action(function (Asset $record) {
                        \App\Models\AssetDeletionConfirmation::create([
                            'asset_id'     => $record->id,
                            'is_confirmed' => false,
                            'requested_by' => auth()->id(),
                        ]);

                        \Filament\Notifications\Notification::make()
                            ->title('تم إرسال طلب الحذف')
                            ->body('سيتم مراجعة الطلب من قِبل المسؤول.')
                            ->success()
                            ->send();
                    }),
            ])
            ->bulkActions([
                DeleteBulkAction::make()
                    ->label('حذف المحدد'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListAssets::route('/'),
            'create' => Pages\CreateAsset::route('/create'),
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

    // ─── Query ──────────────────────────────────────────────────────────────────

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

        return $query->whereIn('department_id', $userDepartmentIds);
    }
}
