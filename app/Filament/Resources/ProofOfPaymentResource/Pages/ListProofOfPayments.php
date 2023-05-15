<?php

namespace App\Filament\Resources\ProofOfPaymentResource\Pages;

use App\Filament\Resources\ProofOfPaymentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProofOfPayments extends ListRecords
{
    protected static string $resource = ProofOfPaymentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
