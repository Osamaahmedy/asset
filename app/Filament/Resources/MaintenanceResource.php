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

    protected static ?string $navigationLabel  = 'الصيانات';
    protected static ?string $pluralModelLabel = 'الصيانات';
    protected static ?string $modelLabel       = 'صيانة';
    protected static ?string $navigationGroup  = 'إدارة الأصول';
    protected static ?string $navigationIcon   = 'heroicon-o-wrench-screwdriver';
    protected static ?int    $navigationSort   = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\Section::make('معلومات الصيانة')
                ->icon('heroicon-o-wrench-screwdriver')
                ->columns(2)
                ->schema([
                    Select::make('asset_id')
                        ->label('الأصل')
                        ->relationship('asset', 'name')
                        ->searchable()
                        ->preload()
                        ->required()
                        ->columnSpanFull(),

                    DatePicker::make('maintenance_date')
                        ->label('تاريخ الصيانة')
                        ->required()
                        ->default(now())
                        ->native(false)
                        ->displayFormat('Y/m/d'),

                    Select::make('status')
                        ->label('الحالة')
                        ->options([
                            'Maintenance Completed' => '✅ اكتملت الصيانة',
                            'Postponed'            => '⏳ مؤجلة',
                            'Pending'              => '🕐 قيد الانتظار',
                        ])
                        ->required()
                        ->default('Maintenance Completed')
                        ->native(false),

                    Textarea::make('note')
                        ->label('ملاحظات')
                        ->rows(3)
                        ->columnSpanFull()
                        ->placeholder('أضف أي ملاحظات تتعلق بهذه الصيانة...'),
                ]),



        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('asset.name')
                    ->label('الأصل')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('asset.department.name')
                    ->label('القسم')
                    ->badge()
                    ->sortable(),

                TextColumn::make('maintenance_date')
                    ->label('تاريخ الصيانة')
                    ->date('Y/m/d')
                    ->sortable(),

                BadgeColumn::make('status')
                    ->label('الحالة')
                    ->colors([
                        'success' => 'Maintenance Completed',
                        'warning' => 'Postponed',
                        'danger'  => 'Pending',
                    ])
                    ->formatStateUsing(fn($state) => match ($state) {
                        'Maintenance Completed' => '✅ اكتملت',
                        'Postponed'            => '⏳ مؤجلة',
                        'Pending'              => '🕐 انتظار',
                        default                => $state,
                    }),

                TextColumn::make('note')
                    ->label('الملاحظات')
                    ->limit(40)
                    ->placeholder('—')
                    ->toggleable(),
            ])
            ->defaultSort('maintenance_date', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('الحالة')
                    ->options([
                        'Maintenance Completed' => 'اكتملت الصيانة',
                        'Postponed'            => 'مؤجلة',
                        'Pending'              => 'قيد الانتظار',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('تعديل'),
                Tables\Actions\DeleteAction::make()->label('حذف'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->label('حذف المحدد'),
            ])
            ->emptyStateIcon('heroicon-o-wrench-screwdriver')
            ->emptyStateHeading('لا توجد صيانات')
            ->emptyStateDescription('ابدأ بإضافة سجل صيانة جديد لأحد الأصول.');
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
