<?php

namespace App\Filament\Resources\AssetResource\Pages;

use App\Filament\Resources\AssetResource;
use Filament\Resources\Pages\EditRecord;
use App\Models\ActivityLog;

class EditAsset extends EditRecord
{
    protected static string $resource = AssetResource::class;

    protected function afterSave(): void
    {
        ActivityLog::create([
            'action' => 'تم تعديل أصل',
            'model_type' => $this->record::class,
            'model_id' => $this->record->id,
        ]);
    }
}
