<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DepartmentResource\Pages;
use App\Models\Department;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
    use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class DepartmentResource extends Resource
{
    // المجموعة (الدروب داون) داخل "الأصول"
protected static ?string $navigationGroup = 'إدارة الأصول'; // إذا حابب تجمع الموارد تحت مجموعة

    // اسم يظهر في القائمة الجانبية بدل اسم الموديل
    protected static ?string $navigationLabel = 'الأقسام';
    protected static ?string $pluralModelLabel = 'الأقسام';

    // أيقونة صحيحة من heroicons
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
     public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required()->unique(ignoreRecord:true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->sortable()->searchable(),
            TextColumn::make('created_at')->dateTime(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDepartments::route('/'),
            'create' => Pages\CreateDepartment::route('/create'),
            'edit' => Pages\EditDepartment::route('/{record}/edit'),
        ];
    }

public static function canViewAny(): bool
{
    return auth()->user()?->can('view dept') ?? false;
}

public static function canCreate(): bool
{
    return auth()->user()?->can('create dept') ?? false;
}

public static function canEdit(Model $record): bool
{
    return auth()->user()?->can('update dept') ?? false;
}

public static function canDelete(Model $record): bool
{
    return auth()->user()?->can('delete dept') ?? false;
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

    // هنا العمود الصحيح هو id وليس department_id
    return $query->whereIn('id', $userDepartmentsIds);
}



}
