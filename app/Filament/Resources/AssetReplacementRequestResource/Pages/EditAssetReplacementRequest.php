<?php

namespace App\Filament\Resources\AssetReplacementRequestResource\Pages;

use App\Filament\Resources\AssetReplacementRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAssetReplacementRequest extends EditRecord
{
    protected static string $resource = AssetReplacementRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
