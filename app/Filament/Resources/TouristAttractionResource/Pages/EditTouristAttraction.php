<?php

namespace App\Filament\Resources\TouristAttractionResource\Pages;

use App\Filament\Resources\TouristAttractionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTouristAttraction extends EditRecord
{
    protected static string $resource = TouristAttractionResource::class;

    protected function getActions(): array
    {
        return [
            //
        ];
    }

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
