<?php

namespace App\Filament\Resources;
    use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Filament\Resources\AssetResource\Pages;
use App\Models\Asset;
use App\Models\Department;
use App\Models\ActivityLog;
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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;

class AssetResource extends Resource
{
    protected static ?string $model = Asset::class;

   // اسم يعرض في القائمة الجانبية
protected static ?string $navigationLabel = 'الأصول';
    protected static ?string $pluralModelLabel = 'الأصول';

// عنوان الصفحة في التصفح (اختياري)
protected static ?string $navigationGroup = 'إدارة الأصول'; // إذا حابب تجمع الموارد تحت مجموعة

// الأيقونة (شوف الخطوة 2)
protected static ?string $navigationIcon = 'heroicon-o-cube';
    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')->required(),

            DatePicker::make('purchase_date')
                ->label('تاريخ الشراء')
                ->required(),

            DatePicker::make('maintenance_due_date')
                ->label('تاريخ الصيانة الأولى')
                ->required(),

            DatePicker::make('last_maintenance_date')
                ->label('تاريخ آخر صيانة')
                ->required(),

          TextInput::make('maintenance_cycle_months')
    ->label('دورة الصيانة (بالأشهر)')
    ->numeric()
    ->required()
    ->default(3),


            TextInput::make('price')
                ->label('السعر')
                ->numeric()
                ->required(),

            TextInput::make('vendor')
                ->label('المورد')
                ->required(),

      Select::make('department_id')
    ->label('القسم')
    ->required()
    ->options(function () {
        return auth()->user()
            ->departments()
            ->pluck('departments.name', 'departments.id')
            ->toArray();
    })
    ->searchable(false),


            SpatieMediaLibraryFileUpload::make('image')
                ->collection('image')
                ->label('صورة'),

            SpatieMediaLibraryFileUpload::make('document')
                ->collection('document')
                ->label('مستند'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('serial_number')->label('الرقم التسلسلي')->copyable(),
                TextColumn::make('vendor'),
                TextColumn::make('price')->money('USD'),
                BadgeColumn::make('maintenance_status')
                    ->label('حالة الصيانة')
                    ->colors([
                        'danger' => fn ($state): bool => $state === '❌ متأخرة',
                        'warning' => fn ($state): bool => str_contains($state, '⚠️'),
                        'success' => fn ($state): bool => $state === '✅ جيدة',
                    ]),

BadgeColumn::make('deletion_status')
    ->label('حالة الحذف')
    ->getStateUsing(function ($record) {
        return $record->deletionConfirmation ? 'بانتظار التأكيد' : 'لا يوجد';
    })
    ->colors([
        'warning' => 'بانتظار التأكيد',
        'success' => 'لا يوجد',
    ]),
                TextColumn::make('department.name')->label('القسم'),
                ImageColumn::make('image')->label('الصورة')->circular(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
Tables\Actions\Action::make('requestDeletion')
    ->label('طلب حذف')
    ->icon('heroicon-o-exclamation-circle')
    ->color('danger')
    ->requiresConfirmation()
    ->action(function (Asset $record) {
        // تحقق إذا لم يكن هناك طلب حذف سابق
        if (!$record->deletionConfirmation) {
            \App\Models\AssetDeletionConfirmation::create([
                'asset_id' => $record->id,
                'is_confirmed' => false,
                'requested_by' => auth()->id(),
            ]);
        }
        // يمكنك إرسال رسالة نجاح مثلاً
        // لا تحذف الأصل هنا، فقط أنشئ الطلب
    }),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssets::route('/'),
            'create' => Pages\CreateAsset::route('/create'),
            'edit' => Pages\EditAsset::route('/{record}/edit'),
        ];
    }

public static function canViewAny(): bool
{
    return auth()->user()?->can('view assets') ?? false;
}

public static function canCreate(): bool
{
    return auth()->user()?->can('create assets') ?? false;
}

public static function canEdit(Model $record): bool
{
    return auth()->user()?->can('update assets') ?? false;
}

public static function canDelete(Model $record): bool
{
    return auth()->user()?->can('delete assets') ?? false;
}

public static function getEloquentQuery(): Builder
{
    $query = parent::getEloquentQuery();

    if (!auth()->check()) {
        return $query->whereRaw('0 = 1'); // لا تعرض شيء إذا لم يدخل المستخدم
    }

$userDepartmentsIds = auth()->user()->departments()->pluck('departments.id')->toArray();

    if (empty($userDepartmentsIds)) {
        return $query->whereRaw('0 = 1'); // لا تعرض شيء إذا المستخدم بدون أقسام
    }

    return $query->whereIn('department_id', $userDepartmentsIds);
}


}
