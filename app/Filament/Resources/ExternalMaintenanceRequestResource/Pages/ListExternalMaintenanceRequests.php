<?php

namespace App\Filament\Resources\ExternalMaintenanceRequestResource\Pages;

use App\Filament\Resources\ExternalMaintenanceRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExternalMaintenanceRequests extends ListRecords
{
    protected static string $resource = ExternalMaintenanceRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
