<?php

namespace App\Filament\Resources\AssetResource\Pages;

use App\Filament\Resources\AssetResource;
use Filament\Resources\Pages\CreateRecord;
use App\Models\ActivityLog;

class CreateAsset extends CreateRecord
{
    protected static string $resource = AssetResource::class;

    protected function afterCreate(): void
    {
        ActivityLog::create([
            'action' => 'تم إنشاء أصل',
            'model_type' => $this->record::class,
            'model_id' => $this->record->id,
        ]);
    }
}
