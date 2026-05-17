<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaintenanceRequestResource\Pages;
use App\Models\MaintenanceRequest;
use App\Models\ExternalMaintenanceRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea as FormTextarea;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class MaintenanceRequestResource extends Resource
{
    protected static ?string $model = MaintenanceRequest::class;

    protected static ?string $navigationGroup  = 'إدارة الأصول';
    protected static ?string $navigationLabel  = 'طلبات الصيانة';
    protected static ?string $pluralModelLabel = 'طلبات الصيانة';
    protected static ?string $modelLabel       = 'طلب صيانة';
    protected static ?string $navigationIcon   = 'heroicon-o-clipboard-document-list';
    protected static ?int    $navigationSort   = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('بيانات الطلب')
                ->icon('heroicon-o-clipboard-document-list')
                ->columns(2)
                ->schema([
                    Select::make('asset_id')
                        ->label('الأصل')
                        ->relationship('asset', 'name')
                        ->searchable()
                        ->preload()
                        ->required()
                        ->disabled()
                        ->columnSpanFull(),

                    Select::make('employee_id')
                        ->label('مرسل الطلب')
                        ->relationship('employee', 'name')
                        ->searchable()
                        ->disabled()
                        ->columnSpanFull(),

                    Forms\Components\DatePicker::make('problem_date')
                        ->label('تاريخ المشكلة')
                        ->disabled()
                        ->native(false)
                        ->displayFormat('Y/m/d'),

                    Select::make('priority')
                        ->label('الأولوية')
                        ->options(MaintenanceRequest::priorityOptions())
                        ->native(false)
                        ->required(),

                    Select::make('status')
                        ->label('الحالة')
                        ->options([
                            'pending'   => '🕐 قيد الانتظار',
                            'postponed' => '⏳ مؤجل',
                            'completed' => '✅ مكتمل',
                        ])
                        ->native(false)
                        ->required(),

                    Textarea::make('problem_description')
                        ->label('وصف المشكلة')
                        ->disabled()
                        ->rows(3)
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('ملاحظات الإدارة')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->columns(2)
                ->schema([
                    Textarea::make('supervisor_note')
                        ->label('ملاحظة المشرف')
                        ->rows(3)
                        ->placeholder('أضف ملاحظتك هنا...'),

                    Textarea::make('it_note')
                        ->label('ملاحظة مسؤول IT')
                        ->rows(3)
                        ->placeholder('أضف ملاحظتك هنا...'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('asset.department.administration.sector.name')
                    ->label('القطاع')
                    ->badge()
                    ->color('gray')
                    ->sortable(),

                TextColumn::make('asset.department.administration.name')
                    ->label('الإدارة')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                TextColumn::make('asset.department.name')
                    ->label('المكتب')
                    ->badge()
                    ->color('success')
                    ->sortable(),

                TextColumn::make('asset.name')
                    ->label('الأصل')
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('employee.name')
                    ->label('مرسل الطلب')
                    ->searchable(),

                TextColumn::make('asset.employee.name')
                    ->label('صاحب الأصل')
                    ->searchable()
                    ->default('—'),

                TextColumn::make('priority')
                    ->label('الأولوية')
                    ->badge()
                    ->formatStateUsing(fn($state) => MaintenanceRequest::priorityOptions()[$state] ?? $state)
                    ->color(fn($state) => match($state) {
                        'high'   => 'danger',
                        'medium' => 'warning',
                        'low'    => 'success',
                        default  => 'gray',
                    }),

                TextColumn::make('status')
                    ->label('الحالة')
                    ->badge()
                    ->formatStateUsing(fn($state) => match($state) {
                        'pending'   => '🕐 قيد الانتظار',
                        'postponed' => '⏳ مؤجل',
                        'completed' => '✅ مكتمل',
                        default     => $state,
                    })
                    ->color(fn($state) => match($state) {
                        'pending'   => 'warning',
                        'postponed' => 'info',
                        'completed' => 'success',
                        default     => 'gray',
                    }),

                // ✅ عمود حالة الطلب الخارجي — في مكانه الصحيح هنا
                TextColumn::make('externalRequest.status')
                    ->label('الترحيل الخارجي')
                    ->badge()
                    ->placeholder('—')
                    ->formatStateUsing(fn($state) => ExternalMaintenanceRequest::statusOptions()[$state] ?? $state)
                    ->color(fn($state) => ExternalMaintenanceRequest::statusColors()[$state] ?? 'gray'),

                TextColumn::make('problem_date')
                    ->label('تاريخ المشكلة')
                    ->date('Y/m/d')
                    ->sortable(),

                TextColumn::make('supervisor_note')
                    ->label('ملاحظة المشرف')
                    ->limit(30)
                    ->placeholder('—')
                    ->toggleable(),

                TextColumn::make('it_note')
                    ->label('ملاحظة IT')
                    ->limit(30)
                    ->placeholder('—')
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإرسال')
                    ->dateTime('Y/m/d - h:i A')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('الحالة')
                    ->options([
                        'pending'   => 'قيد الانتظار',
                        'postponed' => 'مؤجل',
                        'completed' => 'مكتمل',
                    ]),

                SelectFilter::make('priority')
                    ->label('الأولوية')
                    ->options(MaintenanceRequest::priorityOptions()),
            ])
            ->actions([
                // ✅ Action الترحيل الخارجي — في مكانه الصحيح هنا
                Action::make('transfer_external')
                    ->label('ترحيل خارجي')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->color('warning')
                    ->visible(fn($record) => !$record->externalRequest()->exists())
                    ->modalHeading('إنشاء طلب ترحيل خارجي')
                    ->modalDescription('سيتم إنشاء طلب صيانة خارجية مرتبط بهذا الطلب.')
                    ->modalWidth('2xl')
                    ->form([
                        FormTextarea::make('technical_description')
                            ->label('الوصف الفني')
                            ->required()
                            ->rows(4)
                            ->placeholder('اكتب الوصف الفني للعطل...'),



                        FormTextarea::make('required_parts')
                            ->label('القطع المطلوبة')
                            ->rows(3)
                            ->placeholder('اذكر القطع أو المواد المطلوبة...'),
                    ])
                    ->action(function ($record, array $data) {
                        ExternalMaintenanceRequest::create([
                            'maintenance_request_id' => $record->id,
                            'technical_description'  => $data['technical_description'],
                            'required_parts'         => $data['required_parts'] ?? null,
                            'status'                 => 'pending',
                            'created_by'             => auth()->id(),
                        ]);

                        Notification::make()
                            ->title('تم إنشاء الطلب الخارجي بنجاح')
                            ->success()
                            ->send();
                    }),

                Tables\Actions\EditAction::make()->label('تعديل'),
                Tables\Actions\DeleteAction::make()->label('حذف'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->label('حذف المحدد'),
            ])
            ->emptyStateIcon('heroicon-o-clipboard-document-list')
            ->emptyStateHeading('لا توجد طلبات صيانة')
            ->emptyStateDescription('لم يتم إرسال أي طلبات بعد.');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaintenanceRequests::route('/'),
            'edit'  => Pages\EditMaintenanceRequest::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->with([
                'asset.department.administration.sector',
                'asset.employee',
                'employee',
                'externalRequest', // ✅ لازم تضيفه هنا عشان العمود الجانبي يشتغل بدون N+1
            ]);
    }
}
