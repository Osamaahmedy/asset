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

    protected static ?string $navigationIcon   = 'heroicon-o-users';
    protected static ?int    $navigationSort   = 1;

    public static function getNavigationLabel(): string { return __('messages.resource.employees'); }
    public static function getNavigationGroup(): ?string { return __('messages.nav.hr_management'); }
    public static function getModelLabel(): string { return __('messages.resource.employee'); }
    public static function getPluralModelLabel(): string { return __('messages.resource.employees'); }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make(__('messages.section.employee_info'))
                ->icon('heroicon-o-user')
                ->columns(2)
                ->schema([
                    TextInput::make('name')
                        ->label(__('messages.field.name'))
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull()
                        ->placeholder(__('messages.field.name')),

                   TextInput::make('phone')
                        ->label(__('messages.field.phone'))
                        ->tel()
                        ->maxLength(20)
                        ->unique(table: 'employees', column: 'phone', ignoreRecord: true) // ← هذا الناقص
                        ->placeholder(__('messages.field.phone')),

                    TextInput::make('password')
                        ->label(__('messages.field.password'))
                        ->password()
                        ->revealable()
                        ->required(fn($livewire) => $livewire instanceof Pages\CreateEmployee)
                        ->dehydrated(fn($state) => filled($state))
                        ->maxLength(255)
                        ->placeholder(__('messages.field.password')),
                ]),

            Forms\Components\Section::make(__('messages.section.job_office'))
                ->icon('heroicon-o-building-office')
                ->columns(2)
                ->schema([
                    Select::make('position')
                        ->label(__('messages.field.position'))
                        ->options(Employee::positionOptions())
                        ->required()
                        ->default('employee')
                        ->native(false),

                    Select::make('priority')
                        ->label(__('messages.field.priority'))
                        ->options(Employee::priorityOptions())
                        ->required()
                        ->default('medium')
                        ->native(false),

                    Select::make('department_id')
                        ->label(__('messages.field.office'))
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
                        ->placeholder(__('messages.field.office')),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('department.administration.sector.name')
                    ->label(__('messages.field.sector'))
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('gray'),

                TextColumn::make('department.administration.name')
                    ->label(__('messages.field.administration'))
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('info'),

                TextColumn::make('department.name')
                    ->label(__('messages.field.office'))
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('success'),

                TextColumn::make('name')
                    ->label(__('messages.field.name'))
                    ->sortable()
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('phone')
                    ->label(__('messages.field.phone'))
                    ->searchable()
                    ->copyable()
                    ->icon('heroicon-m-phone'),

                TextColumn::make('position')
                    ->label(__('messages.field.position'))
                    ->badge()
                    ->formatStateUsing(fn($state) => Employee::positionOptions()[$state] ?? $state)
                    ->color(fn($state) => match($state) {
                        'office_manager'   => 'warning',
                        'purchasing_agent' => 'success',
                        'employee'         => 'primary',
                        default            => 'gray',
                    }),

                TextColumn::make('priority')
                    ->label(__('messages.field.priority'))
                    ->badge()
                    ->formatStateUsing(fn($state) => Employee::priorityOptions()[$state] ?? $state)
                    ->color(fn($state) => match($state) {
                        'high'   => 'danger',
                        'medium' => 'warning',
                        'low'    => 'success',
                        default  => 'gray',
                    }),

                TextColumn::make('assets_count')
                    ->label(__('messages.field.assigned_assets'))
                    ->counts('assets')
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
                        if ($record->assets()->exists()) {
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
            ->emptyStateIcon('heroicon-o-users')
            ->emptyStateHeading(__('messages.empty.no_employees'));
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
