<?php

namespace App\Filament\Resources\AssetHandoverResource\Pages;

use App\Filament\Resources\AssetHandoverResource;
use App\Models\Asset;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAssetHandover extends CreateRecord
{
    protected static string $resource = AssetHandoverResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if ($data['action_type'] === 'return' && !empty($data['asset_id'])) {
            $asset = Asset::find($data['asset_id']);
            if ($asset && $asset->employee_id) {
                $data['employee_id'] = $asset->employee_id;
            }
        }

        return $data;
    }
}
