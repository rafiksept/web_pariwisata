<?php

namespace App\Filament\Resources\KulinerResource\Pages;

use App\Filament\Resources\KulinerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKuliner extends EditRecord
{
    protected static string $resource = KulinerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
