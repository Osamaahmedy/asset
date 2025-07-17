<?php

namespace App\Filament\Resources\AssetDeletionConfirmationResource\Pages;

use App\Filament\Resources\AssetDeletionConfirmationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAssetDeletionConfirmation extends EditRecord
{
    protected static string $resource = AssetDeletionConfirmationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
