<?php

namespace App\Filament\Resources;
    use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Filament\Resources\MaintenanceResource\Pages;
use App\Models\Asset;
use App\Models\Maintenance;
use App\Models\ActivityLog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class MaintenanceResource extends Resource
{
    protected static ?string $model = Maintenance::class;


   // Name displayed in the sidebar
protected static ?string $navigationLabel = 'Maintenances';
protected static ?string $pluralModelLabel = 'Maintenance';

// Put it under the Assets group
protected static ?string $navigationGroup = 'Asset Management';


    // اختر أيقونة مناسبة، مثلاً "wrench" أو "tool"
    protected static ?string $navigationIcon = 'heroicon-o-wrench';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('asset_id')
                ->label('asset')
                ->relationship('asset', 'name')
                ->searchable()
                ->required(),

            DatePicker::make('maintenance_date')->required(),

            Textarea::make('note')->label('note'),

            Select::make('status')
    ->options([
        'Maintenance Completed' => 'Maintenance Completed',
        'Postponed' => 'Postponed',
        'Pending' => 'Pending',
    ])
    ->required()
    ->default('Maintenance Completed'),


            SpatieMediaLibraryFileUpload::make('images')
                ->collection('images')
                ->label('Maintenance Image'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('asset.name')->label('asset')->searchable(),
            TextColumn::make('maintenance_date')->date(),
            TextColumn::make('status'),
            TextColumn::make('note')->limit(30),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaintenances::route('/'),
            'create' => Pages\CreateMaintenance::route('/create'),
            'edit' => Pages\EditMaintenance::route('/{record}/edit'),
        ];
    }

public static function canViewAny(): bool
{
    return auth()->user()?->can('view maint') ?? false;
}

public static function canCreate(): bool
{
    return auth()->user()?->can('create maint') ?? false;
}

public static function canEdit(Model $record): bool
{
    return auth()->user()?->can('update maint') ?? false;
}

public static function canDelete(Model $record): bool
{
    return auth()->user()?->can('delete maint') ?? false;
}

public static function getEloquentQuery(): Builder
{
    $query = parent::getEloquentQuery();

    if (!auth()->check()) {
        return $query->whereRaw('0 = 1');
    }

    $userDepartmentsIds = auth()->user()->departments()->pluck('departments.id')->toArray();

    if (empty($userDepartmentsIds)) {
        return $query->whereRaw('0 = 1');
    }

    return $query->whereHas('asset', function ($q) use ($userDepartmentsIds) {
        $q->whereIn('department_id', $userDepartmentsIds);
    });
}



}
