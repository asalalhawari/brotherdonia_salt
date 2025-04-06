<?php

namespace App\Filament\Resources\OccasionsResource\Pages;

use App\Filament\Resources\OccasionsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOccasions extends ListRecords
{
    protected static string $resource = OccasionsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
