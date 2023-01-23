<?php

namespace App\Filament\Resources\TouristAttractionResource\Pages;

use App\Filament\Resources\TouristAttractionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTouristAttraction extends CreateRecord
{
    protected static string $resource = TouristAttractionResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
