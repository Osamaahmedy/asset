<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetDeletionConfirmationResource\Pages;
use App\Models\AssetDeletionConfirmation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class AssetDeletionConfirmationResource extends Resource
{
    protected static ?string $model = AssetDeletionConfirmation::class;

    protected static ?string $navigationIcon  = 'heroicon-o-trash';
    protected static ?string $navigationLabel = 'طلبات حذف الأصول';
    protected static ?string $pluralModelLabel = 'طلبات الحذف';
    protected static ?string $modelLabel      = 'طلب حذف';
    protected static ?string $navigationGroup = 'إدارة الأصول';
    protected static ?int    $navigationSort  = 2;

    // ── كونتر: عدد الطلبات غير المؤكدة ──────────────────────────────────────
    public static function getNavigationBadge(): ?string
    {
        $count = static::getModel()::query()
            ->where('is_confirmed', false)
            ->count();

        return $count > 0 ? (string) $count : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('تفاصيل الطلب')
                ->icon('heroicon-o-trash')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('asset.name')
                        ->label('الأصل المراد حذفه')
                        ->disabled(),

                    Forms\Components\TextInput::make('requestedBy.name')
                        ->label('طالب الحذف')
                        ->disabled(),
                ]),

            Forms\Components\Section::make('قرار الحذف')
                ->icon('heroicon-o-check-circle')
                ->schema([
                    Forms\Components\Toggle::make('is_confirmed')
                        ->label('تأكيد الحذف')
                        ->helperText('تفعيل هذا الخيار سيحذف الأصل نهائياً ولا يمكن التراجع')
                        ->onColor('danger')
                        ->offColor('success')
                        ->required(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('asset.name')
                    ->label('الأصل')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->placeholder('— محذوف —'),

                Tables\Columns\TextColumn::make('asset.department.name')
                    ->label('القسم')
                    ->badge()
                    ->placeholder('—'),

                Tables\Columns\TextColumn::make('requestedBy.name')
                    ->label('طالب الحذف')
                    ->sortable()
                    ->placeholder('—'),

                Tables\Columns\IconColumn::make('is_confirmed')
                    ->label('الحالة')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-clock')
                    ->trueColor('danger')
                    ->falseColor('warning')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الطلب')
                    ->dateTime('Y/m/d - h:i A')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Tables\Actions\Action::make('confirm')
                    ->label('تأكيد الحذف')
                    ->icon('heroicon-o-check')
                    ->color('danger')
                    ->visible(fn(AssetDeletionConfirmation $record) => !$record->is_confirmed)
                    ->requiresConfirmation()
                    ->modalHeading('تأكيد حذف الأصل')
                    ->modalDescription(fn(AssetDeletionConfirmation $record) =>
                        'هل أنت متأكد من حذف الأصل "' . ($record->asset?->name ?? '—') . '" نهائياً؟ لا يمكن التراجع عن هذا الإجراء.')
                    ->modalSubmitActionLabel('نعم، احذف نهائياً')
                    ->modalCancelActionLabel('إلغاء')
                    ->action(function (AssetDeletionConfirmation $record) {
                        $record->update(['is_confirmed' => true]);

                        \Filament\Notifications\Notification::make()
                            ->title('تم تأكيد الحذف')
                            ->body('تم حذف الأصل بنجاح.')
                            ->danger()
                            ->send();
                    }),

                Tables\Actions\Action::make('reject')
                    ->label('رفض الطلب')
                    ->icon('heroicon-o-x-circle')
                    ->color('gray')
                    ->visible(fn(AssetDeletionConfirmation $record) => !$record->is_confirmed)
                    ->requiresConfirmation()
                    ->modalHeading('رفض طلب الحذف')
                    ->modalDescription('هل تريد رفض هذا الطلب وحذفه؟')
                    ->modalSubmitActionLabel('نعم، ارفض')
                    ->modalCancelActionLabel('إلغاء')
                    ->action(function (AssetDeletionConfirmation $record) {
                        $record->delete();

                        \Filament\Notifications\Notification::make()
                            ->title('تم رفض الطلب')
                            ->body('تم رفض طلب الحذف وإلغاؤه.')
                            ->warning()
                            ->send();
                    }),

                Tables\Actions\EditAction::make()
                    ->label('تعديل'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->label('حذف المحدد'),
            ])
            ->emptyStateIcon('heroicon-o-trash')
            ->emptyStateHeading('لا توجد طلبات حذف')
            ->emptyStateDescription('ستظهر هنا طلبات حذف الأصول التي تحتاج إلى موافقة.');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListAssetDeletionConfirmations::route('/'),
            'create' => Pages\CreateAssetDeletionConfirmation::route('/create'),
            'edit'   => Pages\EditAssetDeletionConfirmation::route('/{record}/edit'),
        ];
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

    // ─── Permissions ─────────────────────────────────────────────────────────

    public static function canViewAny(): bool
    {
        return auth()->user()?->can('عرض طلبات الحذف') ?? false;
    }

    public static function canCreate(): bool
    {
        return false; // الطلبات تُنشأ من صفحة الأصول فقط
    }

    public static function canEdit(Model $record): bool
    {
        return auth()->user()?->can('تعديل طلبات الحذف') ?? false;
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()?->can('حذف طلبات الحذف') ?? false;
    }
}
