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
}
