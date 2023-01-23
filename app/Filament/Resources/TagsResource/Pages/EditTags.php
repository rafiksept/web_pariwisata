<?php

namespace App\Filament\Resources\TagsResource\Pages;

use App\Filament\Resources\TagsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTags extends EditRecord
{
    protected static string $resource = TagsResource::class;

    protected function getActions(): array
    {
        return [
            
        ];
    }

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
