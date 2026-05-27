<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DepartmentResource\Pages;
use App\Models\Department;
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
use Illuminate\Database\Eloquent\Builder;

class DepartmentResource extends Resource
{
    protected static ?string $model = Department::class;

    protected static ?string $navigationIcon   = 'heroicon-o-building-office-2';
    protected static ?int    $navigationSort   = 3;

    public static function getNavigationLabel(): string { return __('messages.resource.departments'); }
    public static function getNavigationGroup(): ?string { return __('messages.nav.asset_management'); }
    public static function getModelLabel(): string { return __('messages.resource.department'); }
    public static function getPluralModelLabel(): string { return __('messages.resource.departments'); }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make(__('messages.section.office_info'))
                ->icon('heroicon-o-building-office-2')
                ->schema([
                    Select::make('administration_id')
                        ->label(__('messages.field.administration'))
                        ->relationship('administration', 'name')
                        ->searchable()
                        ->preload()
                        ->required()
                        ->placeholder(__('messages.field.administration'))
                        // عرض القطاع مع اسم الإدارة للتوضيح
                        ->getOptionLabelFromRecordUsing(
                            fn(Administration $record) =>
                                "{$record->name} — ({$record->sector?->name})"
                        ),

                    TextInput::make('name')
                        ->label(__('messages.field.name'))
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255)
                        ->placeholder(__('messages.field.name')),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('administration.sector.name')
                    ->label(__('messages.field.sector'))
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('gray'),

                TextColumn::make('administration.name')
                    ->label(__('messages.field.administration'))
                    ->sortable()
                    ->searchable()
                    ->badge()
                    ->color('info'),

                TextColumn::make('name')
                    ->label(__('messages.field.name'))
                    ->sortable()
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('assets_count')
                    ->label(__('messages.field.asset_count'))
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
            ->emptyStateIcon('heroicon-o-building-office-2')
            ->emptyStateHeading(__('messages.empty.no_departments'));
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListDepartments::route('/'),
            'create' => Pages\CreateDepartment::route('/create'),
            'edit'   => Pages\EditDepartment::route('/{record}/edit'),
        ];
    }

    // ─── Permissions ─────────────────────────────────────────────────────────

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('عرض الأقسام') ?? false;
    }

    public static function canCreate(): bool
    {
        return auth()->user()?->can('إنشاء قسم') ?? false;
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()?->can('تعديل الأقسام') ?? false;
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()?->can('حذف الأقسام') ?? false;
    }

    // ─── Query ───────────────────────────────────────────────────────────────

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery()->with(['administration.sector']);

        $user = auth()->user();

        if (!$user) {
            return $query->whereRaw('0 = 1');
        }

        // المدير العام يرى كل المكاتب
        if ($user->can('عرض جميع الأقسام')) {
            return $query;
        }

        $userDepartmentIds = $user->departments()->pluck('departments.id')->toArray();

        if (empty($userDepartmentIds)) {
            return $query->whereRaw('0 = 1');
        }

        return $query->whereIn('id', $userDepartmentIds);
    }
}
