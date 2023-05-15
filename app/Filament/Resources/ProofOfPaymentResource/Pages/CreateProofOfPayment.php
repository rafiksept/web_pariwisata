<?php

namespace App\Filament\Resources\ProofOfPaymentResource\Pages;

use App\Filament\Resources\ProofOfPaymentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProofOfPayment extends CreateRecord
{
    protected static string $resource = ProofOfPaymentResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
