<?php

namespace App\Filament\Resources\AssetDeletionConfirmationResource\Pages;

use App\Filament\Resources\AssetDeletionConfirmationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssetDeletionConfirmations extends ListRecords
{
    protected static string $resource = AssetDeletionConfirmationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
