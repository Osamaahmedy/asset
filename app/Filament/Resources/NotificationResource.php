<?php

namespace App\Filament\Resources;
use Illuminate\Database\Eloquent\Builder;

use App\Filament\Resources\NotificationResource\Pages;
use App\Models\Notification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;

class NotificationResource extends Resource
{
    protected static ?string $model = Notification::class;

    protected static ?string $navigationGroup = 'التنبيهات';

    protected static ?string $navigationIcon = 'heroicon-o-bell';

    protected static ?string $navigationLabel = 'الإشعارات';

    protected static ?string $pluralModelLabel = 'الإشعارات';

    protected static ?string $modelLabel = 'إشعار';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('message')
                    ->label('الرسالة')
                    ->disabled()
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->label('الحالة')
                    ->disabled()
                    ->required(),
                Forms\Components\Toggle::make('is_read')
                    ->label('مقروء؟')
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('message')
                    ->label('الرسالة')
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('status')
                    ->label('الحالة')
                    ->sortable(),
                Tables\Columns\BooleanColumn::make('is_read')
                    ->label('مقروء؟')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الإشعار')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('unread')
                    ->label('غير مقروءة فقط')
                    ->query(fn ($query) => $query->where('is_read', false)),
            ])
            ->actions([
                Tables\Actions\Action::make('markAsRead')
                    ->label('تحديد كمقروء')
                    ->action(fn (Notification $record) => $record->update(['is_read' => true]))
                    ->requiresConfirmation()
                    ->icon('heroicon-o-check'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkAction::make('markAllRead')
                    ->label('تحديد الكل كمقروء')
                    ->action(fn ($records) => $records->each(fn ($record) => $record->update(['is_read' => true])))
                    ->icon('heroicon-o-check-circle'),
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNotifications::route('/'),
            // لو حبيت تضيف الصفحات الإضافية مثل show أو create
        ];
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
public static function canViewAny(): bool
{
    return auth()->user()?->can('view nav') ?? false;
}



}
