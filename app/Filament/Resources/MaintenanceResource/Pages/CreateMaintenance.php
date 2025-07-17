<?php

namespace App\Filament\Resources\MaintenanceResource\Pages;

use App\Filament\Resources\MaintenanceResource;
use App\Models\ActivityLog;
use Filament\Resources\Pages\CreateRecord;

class CreateMaintenance extends CreateRecord
{
    protected static string $resource = MaintenanceResource::class;

    protected function afterCreate(): void
    {
        ActivityLog::create([
            'action' => 'تم إنشاء صيانة',
            'model_type' => $this->record::class,
            'model_id' => $this->record->id,
        ]);
    }
}
