<?php

namespace App\Filament\Resources\AssetAuditResource\Pages;

use App\Filament\Resources\AssetAuditResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAssetAudit extends CreateRecord
{
    protected static string $resource = AssetAuditResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();
        return $data;
    }

    protected function afterCreate(): void
    {
        $audit = $this->record;
        
        // Fetch all assets expected at this location
        $expectedAssets = \App\Models\Asset::where('location_id', $audit->location_id)
            ->whereNotIn('status', [\App\Models\Asset::STATUS_DAMAGED, \App\Models\Asset::STATUS_MAINTENANCE])
            ->get();

        foreach ($expectedAssets as $asset) {
            \App\Models\AssetAuditItem::create([
                'asset_audit_id' => $audit->id,
                'asset_id' => $asset->id,
                'status' => 'Missing', // Initially missing until scanned
                'scanned_serial_number' => null,
            ]);
        }
    }
}
