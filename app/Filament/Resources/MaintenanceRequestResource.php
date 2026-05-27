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

    protected static ?string $navigationIcon   = 'heroicon-o-clipboard-document-list';
    protected static ?int    $navigationSort   = 3;

    public static function getNavigationLabel(): string { return __('messages.resource.maintenance_requests'); }
    public static function getNavigationGroup(): ?string { return __('messages.nav.asset_management'); }
    public static function getModelLabel(): string { return __('messages.resource.maintenance_request'); }
    public static function getPluralModelLabel(): string { return __('messages.resource.maintenance_requests'); }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make(__('messages.section.request_data'))
                ->icon('heroicon-o-clipboard-document-list')
                ->columns(2)
                ->schema([
                    Select::make('asset_id')
                        ->label(__('messages.field.asset'))
                        ->relationship('asset', 'name')
                        ->searchable()
                        ->preload()
                        ->required()
                        ->disabled()
                        ->columnSpanFull(),

                    Select::make('employee_id')
                        ->label(__('messages.field.employee'))
                        ->relationship('employee', 'name')
                        ->searchable()
                        ->disabled()
                        ->columnSpanFull(),

                    Forms\Components\DatePicker::make('problem_date')
                        ->label(__('messages.field.created_at'))
                        ->disabled()
                        ->native(false)
                        ->displayFormat('Y/m/d'),

                    Select::make('priority')
                        ->label(__('messages.field.priority'))
                        ->options(MaintenanceRequest::priorityOptions())
                        ->native(false)
                        ->required(),

                    Select::make('status')
                        ->label(__('messages.field.status'))
                        ->options([
                            'pending'   => '🕐 ' . __('messages.status.pending'),
                            'postponed' => '⏳ ' . __('messages.status.postponed'),
                            'completed' => '✅ ' . __('messages.status.completed'),
                        ])
                        ->native(false)
                        ->required(),

                    Textarea::make('problem_description')
                        ->label(__('messages.field.description'))
                        ->disabled()
                        ->rows(3)
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make(__('messages.section.admin_notes'))
                ->icon('heroicon-o-chat-bubble-left-right')
                ->columns(2)
                ->schema([
                    Textarea::make('supervisor_note')
                        ->label(__('messages.field.notes'))
                        ->rows(3)
                        ->placeholder(__('messages.field.notes')),

                    Textarea::make('it_note')
                        ->label(__('messages.field.notes'))
                        ->rows(3)
                        ->placeholder(__('messages.field.notes')),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('asset.department.administration.sector.name')
                    ->label(__('messages.field.sector'))
                    ->badge()
                    ->color('gray')
                    ->sortable(),

                TextColumn::make('asset.department.administration.name')
                    ->label(__('messages.field.administration'))
                    ->badge()
                    ->color('info')
                    ->sortable(),

                TextColumn::make('asset.department.name')
                    ->label(__('messages.field.office'))
                    ->badge()
                    ->color('success')
                    ->sortable(),

                TextColumn::make('asset.name')
                    ->label(__('messages.field.asset'))
                    ->searchable()
                    ->weight('bold'),

                TextColumn::make('employee.name')
                    ->label(__('messages.field.employee'))
                    ->searchable(),

                TextColumn::make('asset.employee.name')
                    ->label(__('messages.field.employee'))
                    ->searchable()
                    ->default('—'),

                TextColumn::make('priority')
                    ->label(__('messages.field.priority'))
                    ->badge()
                    ->formatStateUsing(fn($state) => MaintenanceRequest::priorityOptions()[$state] ?? $state)
                    ->color(fn($state) => match($state) {
                        'high'   => 'danger',
                        'medium' => 'warning',
                        'low'    => 'success',
                        default  => 'gray',
                    }),

                TextColumn::make('status')
                    ->label(__('messages.field.status'))
                    ->badge()
                    ->formatStateUsing(fn($state) => match($state) {
                        'pending'   => '🕐 ' . __('messages.status.pending'),
                        'postponed' => '⏳ ' . __('messages.status.postponed'),
                        'completed' => '✅ ' . __('messages.status.completed'),
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
                    ->label(__('messages.action.transfer_external'))
                    ->badge()
                    ->placeholder('—')
                    ->formatStateUsing(fn($state) => ExternalMaintenanceRequest::statusOptions()[$state] ?? $state)
                    ->color(fn($state) => ExternalMaintenanceRequest::statusColors()[$state] ?? 'gray'),

                TextColumn::make('problem_date')
                    ->label(__('messages.field.created_at'))
                    ->date('Y/m/d')
                    ->sortable(),

                TextColumn::make('supervisor_note')
                    ->label(__('messages.field.notes'))
                    ->limit(30)
                    ->placeholder('—')
                    ->toggleable(),

                TextColumn::make('it_note')
                    ->label(__('messages.field.notes'))
                    ->limit(30)
                    ->placeholder('—')
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label(__('messages.field.created_at'))
                    ->dateTime('Y/m/d - h:i A')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label(__('messages.field.status'))
                    ->options([
                        'pending'   => __('messages.status.pending'),
                        'postponed' => __('messages.status.postponed'),
                        'completed' => __('messages.status.completed'),
                    ]),

                SelectFilter::make('priority')
                    ->label(__('messages.field.priority'))
                    ->options(MaintenanceRequest::priorityOptions()),
            ])
            ->actions([
                // ✅ Action الترحيل الخارجي — في مكانه الصحيح هنا
                Action::make('transfer_external')
                    ->label(__('messages.action.transfer_external'))
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->color('warning')
                    ->visible(fn($record) => !$record->externalRequest()->exists())
                    ->modalHeading(__('messages.action.transfer_external'))
                    ->modalWidth('2xl')
                    ->form([
                        FormTextarea::make('technical_description')
                            ->label(__('messages.field.technical_description'))
                            ->required()
                            ->rows(4)
                            ->placeholder(__('messages.field.technical_description')),

                        FormTextarea::make('required_parts')
                            ->label(__('messages.field.required_parts'))
                            ->rows(3)
                            ->placeholder(__('messages.field.required_parts')),
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
                            ->title(__('messages.profile.saved'))
                            ->success()
                            ->send();
                    }),

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->emptyStateIcon('heroicon-o-clipboard-document-list')
            ->emptyStateHeading(__('messages.empty.no_maintenance_requests'));
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
