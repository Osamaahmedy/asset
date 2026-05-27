<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssetAuditResource\Pages;
use App\Filament\Resources\AssetAuditResource\RelationManagers;
use App\Models\AssetAudit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AssetAuditResource extends Resource
{
    protected static ?string $model = AssetAudit::class;

    protected static ?string $navigationIcon   = 'heroicon-o-clipboard-document-check';
    protected static ?int    $navigationSort   = 3;

    public static function getNavigationLabel(): string { return __('messages.resource.asset_audits'); }
    public static function getNavigationGroup(): ?string { return __('messages.nav.asset_management'); }
    public static function getModelLabel(): string { return __('messages.resource.asset_audit'); }
    public static function getPluralModelLabel(): string { return __('messages.resource.asset_audits'); }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make(__('messages.section.audit_details'))
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('messages.field.name'))
                            ->placeholder(__('messages.field.name'))
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('audit_date')
                            ->label(__('messages.field.audit_date'))
                            ->required()
                            ->default(now()),
                        Forms\Components\Select::make('location_id')
                            ->label(__('messages.field.location'))
                            ->relationship('location', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                        Forms\Components\Select::make('status')
                            ->label(__('messages.field.status'))
                            ->options([
                                'In Progress' => __('messages.status.in_progress'),
                                'Completed' => __('messages.status.completed'),
                            ])
                            ->default('In Progress')
                            ->required(),
                        Forms\Components\Textarea::make('notes')
                            ->label(__('messages.field.notes'))
                            ->columnSpanFull(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('messages.field.name'))
                    ->default('Routine Audit')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location.name')
                    ->label(__('messages.field.location'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('audit_date')
                    ->label(__('messages.field.audit_date'))
                    ->date('Y/m/d')
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->label(__('messages.field.status'))
                    ->colors([
                        'warning' => 'In Progress',
                        'success' => 'Completed',
                    ])
                    ->formatStateUsing(fn ($state) => $state === 'Completed' ? __('messages.status.completed') : __('messages.status.in_progress')),
                Tables\Columns\TextColumn::make('user.name')
                    ->label(__('messages.field.employee'))
                    ->default(auth()->user()->name ?? '—')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('scan')
                    ->label(__('messages.action.scan_barcode'))
                    ->icon('heroicon-o-qr-code')
                    ->color('success')
                    ->url(fn (AssetAudit $record): string => static::getUrl('scan', ['record' => $record])),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssetAudits::route('/'),
            'create' => Pages\CreateAssetAudit::route('/create'),
            'view' => Pages\ViewAssetAudit::route('/{record}'),
            'edit' => Pages\EditAssetAudit::route('/{record}/edit'),
            'scan' => Pages\ScanAssetAudit::route('/{record}/scan'),
        ];
    }
}
