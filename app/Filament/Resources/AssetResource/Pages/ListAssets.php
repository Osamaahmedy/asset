<?php

namespace App\Filament\Resources\AssetResource\Pages;

use App\Filament\Resources\AssetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

use pxlrbt\FilamentExcel\Actions\Pages\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use pxlrbt\FilamentExcel\Columns\Column;

class ListAssets extends ListRecords
{
    protected static string $resource = AssetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(__('messages.resource.add_asset')),
             
          //  \Filament\Actions\ImportAction::make()
          //      ->label('استيراد الأصول')
          //      ->importer(\App\Filament\Imports\AssetImporter::class)
          //      ->icon('heroicon-o-arrow-up-tray'),

            ExportAction::make()
                ->label(__('messages.resource.export_assets'))
                ->color('success')
                ->icon('heroicon-o-document-arrow-down')
                ->exports([
                    ExcelExport::make()
                        ->withFilename('تقرير_الأصول_والصيانات_' . date('Y-m-d'))
                        ->modifyQueryUsing(fn ($query) => $query->with(['maintenances', 'employee', 'department', 'location', 'vendor', 'assetType']))
                        ->withColumns([
                            Column::make('name')->heading('اسم الأصل'),
                            Column::make('serial_number')->heading('الرقم التسلسلي'),
                            Column::make('employee.name')->heading('اسم المالك (الموظف)'),
                            Column::make('department.name')->heading('القسم / المكتب'),
                            Column::make('location.name')->heading('الموقع'),
                            Column::make('vendor_name')->heading('المورد'),
                            Column::make('price')->heading('السعر'),
                            Column::make('purchase_date')->heading('تاريخ الشراء'),
                            Column::make('salvage_value')->heading('القيمة التخريدية'),
                            Column::make('useful_life_years')->heading('العمر الافتراضي'),
                            Column::make('current_book_value')->heading('القيمة الحالية الدفترية')
                                ->formatStateUsing(fn ($state, $record) => $record->current_book_value !== null ? number_format($record->current_book_value, 2) : 'بيانات غير مكتملة'),
                            Column::make('assetType.name')->heading('نوع الأصل'),
                            Column::make('status')->heading('الحالة'),
                            Column::make('is_personal')->heading('الملكية')
                                ->formatStateUsing(fn ($state) => $state ? 'شخصي' : 'جهة العمل'),
                            Column::make('id')->heading('سجل الصيانات وتفاصيلها')
                                ->formatStateUsing(function ($state, $record) {
                                    if (!$record->maintenances || $record->maintenances->isEmpty()) {
                                        return 'لا يوجد صيانات مسجلة';
                                    }
                                    return $record->maintenances->map(function ($m) {
                                        $cost = $m->cost ? "بتكلفة {$m->cost}" : 'بدون تكلفة';
                                        return "[تاريخ: {$m->maintenance_date} | {$cost}] - التفاصيل: {$m->description}";
                                    })->join('  ||  ');
                                }),
                        ])
                ]),
        ];
    }
}
