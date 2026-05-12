<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Models\Employee;
use App\Models\Department;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationGroup  = 'إدارة الموارد البشرية';
    protected static ?string $navigationLabel  = 'الموظفون';
    protected static ?string $pluralModelLabel = 'الموظفون';
    protected static ?string $modelLabel       = 'موظف';
    protected static ?string $navigationIcon   = 'heroicon-o-users';
    protected static ?int    $navigationSort   = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('المعلومات الأساسية')
                ->icon('heroicon-o-user')
                ->columns(2)
                ->schema([
                    TextInput::make('name')
                        ->label('اسم الموظف')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull()
                        ->placeholder('مثال: أحمد محمد'),

                   TextInput::make('phone')
                       ->label('رقم الهاتف')
                       ->tel()
                       ->maxLength(20)
                       ->unique(table: 'employees', column: 'phone', ignoreRecord: true) // ← هذا الناقص
                       ->placeholder('مثال: 777123456'),

                    TextInput::make('password')
                        ->label('كلمة المرور')
                        ->password()
                        ->revealable()
                        ->required(fn($livewire) => $livewire instanceof Pages\CreateEmployee)
                        ->dehydrated(fn($state) => filled($state))
                        ->maxLength(255)
                        ->placeholder('أدخل كلمة المرور'),
                ]),

            Forms\Components\Section::make('الوظيفة والمكتب')
                ->icon('heroicon-o-building-office')
                ->columns(2)
                ->schema([
                    Select::make('position')
                        ->label('المنصب')
                        ->options(Employee::positionOptions())
                        ->required()
                        ->default('employee')
                        ->native(false),

                    Select::make('priority')
                        ->label('الأولوية')
                        ->options(Employee::priorityOptions())
                        ->required()
                        ->default('medium')
                        ->native(false),

                    Select::make('department_id')
                        ->label('المكتب')
                        ->options(function () {
                            return Department::with('administration.sector')
                                ->get()
                                ->mapWithKeys(fn($dept) => [
                                    $dept->id => "{$dept->name} — {$dept->administration?->name} — {$dept->administration?->sector?->name}"
                                ]);
                        })
                        ->searchable()
                        ->preload()
                        ->required()
                        ->columnSpanFull()
                        ->placeholder('اختر المكتب'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('department.administration.sector.name')
                    ->label('القطاع')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('gray'),

                TextColumn::make('department.administration.name')
                    ->label('الإدارة')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('info'),

                TextColumn::make('department.name')
                    ->label('المكتب')
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('success'),

                TextColumn::make('name')
                    ->label('اسم الموظف')
                    ->sortable()
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('phone')
                    ->label('الهاتف')
                    ->searchable()
                    ->copyable()
                    ->icon('heroicon-m-phone'),

                TextColumn::make('position')
                    ->label('المنصب')
                    ->badge()
                    ->formatStateUsing(fn($state) => Employee::positionOptions()[$state] ?? $state)
                    ->color(fn($state) => match($state) {
                        'office_manager' => 'warning',
                        'employee'       => 'primary',
                        default          => 'gray',
                    }),

                TextColumn::make('priority')
                    ->label('الأولوية')
                    ->badge()
                    ->formatStateUsing(fn($state) => Employee::priorityOptions()[$state] ?? $state)
                    ->color(fn($state) => match($state) {
                        'high'   => 'danger',
                        'medium' => 'warning',
                        'low'    => 'success',
                        default  => 'gray',
                    }),

                TextColumn::make('assets_count')
                    ->label('الأصول المسندة')
                    ->counts('assets')
                    ->badge()
                    ->color('primary'),

                TextColumn::make('created_at')
                    ->label('تاريخ الإضافة')
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
                                ->title('لا يمكن حذف الموظف')
                                ->body('لدى الموظف أصول مرتبطة، يرجى إعادة تعيينها أولاً.')
                                ->danger()
                                ->send();
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->label('حذف المحدد'),
            ])
            ->emptyStateIcon('heroicon-o-users')
            ->emptyStateHeading('لا يوجد موظفون')
            ->emptyStateDescription('ابدأ بإضافة موظف جديد.');
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit'   => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }

    // public static function canViewAny(): bool
    // {
    //     return auth()->user()?->can('عرض الموظفين') ?? false;
    // }

    // public static function canCreate(): bool
    // {
    //     return auth()->user()?->can('إنشاء موظف') ?? false;
    // }

    // public static function canEdit(Model $record): bool
    // {
    //     return auth()->user()?->can('تعديل الموظفين') ?? false;
    // }

    // public static function canDelete(Model $record): bool
    // {
    //     return auth()->user()?->can('حذف الموظفين') ?? false;
    // }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with(['department.administration.sector', 'assets']);
    }
}
