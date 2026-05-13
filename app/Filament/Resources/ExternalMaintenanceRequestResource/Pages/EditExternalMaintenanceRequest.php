<?php

namespace App\Filament\Resources\ExternalMaintenanceRequestResource\Pages;

use App\Filament\Resources\ExternalMaintenanceRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExternalMaintenanceRequest extends EditRecord
{
    protected static string $resource = ExternalMaintenanceRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
