<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExternalMaintenanceRequestResource\Pages;
use App\Models\ExternalMaintenanceRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class ExternalMaintenanceRequestResource extends Resource
{
    protected static ?string $model = ExternalMaintenanceRequest::class;

    protected static ?string $navigationGroup  = 'إدارة الأصول';
    protected static ?string $navigationLabel  = 'الطلبات الخارجية';
    protected static ?string $pluralModelLabel = 'الطلبات الخارجية';
    protected static ?string $modelLabel       = 'طلب خارجي';
    protected static ?string $navigationIcon   = 'heroicon-o-arrow-top-right-on-square';
    protected static ?int    $navigationSort   = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('بيانات الطلب الأصلي')
                ->icon('heroicon-o-clipboard-document-list')
                ->collapsed()
                ->schema([
                    Select::make('maintenance_request_id')
                        ->label('طلب الصيانة')
                        ->relationship(
                            'maintenanceRequest',
                            'id',
                            fn($query) => $query->with('asset')
                        )
                        ->getOptionLabelFromRecordUsing(
                            fn($record) => "#{$record->id} — {$record->asset?->name}"
                        )
                        ->searchable()
                        ->preload()
                        ->required()
                        ->disabled(fn($context) => $context === 'edit')
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('تفاصيل الطلب الخارجي')
                ->icon('heroicon-o-wrench-screwdriver')
                ->columns(2)
                ->schema([
                    Textarea::make('technical_description')
                        ->label('الوصف الفني')
                        ->required()
                        ->rows(4)
                        ->columnSpanFull()
                        ->placeholder('اكتب الوصف الفني للعطل أو المشكلة التي تستوجب الصيانة الخارجية...'),

                    TextInput::make('estimated_amount')
                        ->label('المبلغ التقديري (ريال)')
                        ->numeric()
                        ->minValue(0)
                        ->suffix('ر.ي')
                        ->placeholder('0.00'),

                    Textarea::make('required_parts')
                        ->label('القطع المطلوبة')
                        ->rows(3)
                        ->placeholder('اذكر القطع أو المواد المطلوبة لإتمام الصيانة...')
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('الحالة والملاحظات')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->columns(2)
                ->schema([
                    Select::make('status')
                        ->label('الحالة')
                        ->options(ExternalMaintenanceRequest::statusOptions())
                        ->native(false)
                        ->required()
                        ->live()
                        ->default('pending'),

                    TextInput::make('admin_note')
                        ->label('ملاحظة الإدارة')
                        ->placeholder('ملاحظة اختيارية...'),

                    Textarea::make('rejection_reason')
                        ->label('سبب الرفض')
                        ->rows(3)
                        ->placeholder('يُملأ في حالة الرفض فقط...')
                        ->columnSpanFull()
                        ->visible(fn($get) => $get('status') === 'rejected'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('maintenanceRequest.asset.department.administration.sector.name')
                    ->label('القطاع')
                    ->badge()
                    ->color('gray')
                    ->sortable(),

                TextColumn::make('maintenanceRequest.asset.department.administration.name')
                    ->label('الإدارة')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                TextColumn::make('maintenanceRequest.asset.name')
                    ->label('الأصل')
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('maintenanceRequest.employee.name')
                    ->label('مرسل الطلب')
                    ->searchable(),

                TextColumn::make('technical_description')
                    ->label('الوصف الفني')
                    ->limit(40)
                    ->tooltip(fn($record) => $record->technical_description)
                    ->searchable(),

                TextColumn::make('estimated_amount')
                    ->label('المبلغ التقديري')
                    ->money('YER')
                    ->sortable(),

                TextColumn::make('required_parts')
                    ->label('القطع المطلوبة')
                    ->limit(30)
                    ->placeholder('—')
                    ->toggleable(),

                TextColumn::make('status')
                    ->label('الحالة')
                    ->badge()
                    ->formatStateUsing(fn($state) => ExternalMaintenanceRequest::statusOptions()[$state] ?? $state)
                    ->color(fn($state) => ExternalMaintenanceRequest::statusColors()[$state] ?? 'gray'),

                TextColumn::make('creator.name')
                    ->label('أُنشئ بواسطة')
                    ->placeholder('—')
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('تاريخ الإنشاء')
                    ->dateTime('Y/m/d - h:i A')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('الحالة')
                    ->options(ExternalMaintenanceRequest::statusOptions()),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('تعديل'),
                Tables\Actions\DeleteAction::make()->label('حذف'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->label('حذف المحدد'),
            ])
            ->emptyStateIcon('heroicon-o-arrow-top-right-on-square')
            ->emptyStateHeading('لا توجد طلبات خارجية')
            ->emptyStateDescription('لم يتم إنشاء أي طلب ترحيل خارجي بعد.');
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListExternalMaintenanceRequests::route('/'),
            'create' => Pages\CreateExternalMaintenanceRequest::route('/create'),
            'edit'   => Pages\EditExternalMaintenanceRequest::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()
            ->with([
                'maintenanceRequest.asset.department.administration.sector',
                'maintenanceRequest.employee',
                'creator',
            ]);
    }
}
