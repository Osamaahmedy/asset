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
        $asset = $this->record->asset;

        ActivityLog::create([
            'action'          => 'Maintenance updated',
            'model_type'      => $this->record::class,
            'model_id'        => $this->record->id,
            'model_name'      => 'صيانة: ' . ($asset?->name ?? '—'),
            'department_name' => $asset?->department?->name,
        ]);
    }
}
