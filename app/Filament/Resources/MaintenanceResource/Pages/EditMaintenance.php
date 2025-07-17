<?php

namespace App\Filament\Resources\MaintenanceResource\Pages;

use App\Filament\Resources\MaintenanceResource;
use App\Models\ActivityLog;
use Filament\Resources\Pages\EditRecord;

class EditMaintenance extends EditRecord
{
    protected static string $resource = MaintenanceResource::class;

    protected function afterSave(): void
    {
        ActivityLog::create([
            'action' => 'تم تعديل صيانة',
            'model_type' => $this->record::class,
            'model_id' => $this->record->id,
        ]);
    }
}
