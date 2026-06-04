<?php

namespace App\Filament\Resources\AssetHandoverResource\Pages;

use App\Filament\Resources\AssetHandoverResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAssetHandover extends EditRecord
{
    protected static string $resource = AssetHandoverResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if ($data['action_type'] === 'return' && !empty($data['asset_id'])) {
            $asset = \App\Models\Asset::find($data['asset_id']);
            if ($asset && $asset->employee_id) {
                $data['employee_id'] = $asset->employee_id;
            }
        }

        return $data;
    }
}
