<?php

namespace App\Filament\Professor\Resources\Retiradas\Pages;

use App\Filament\Professor\Resources\Retiradas\RetiradaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditRetirada extends EditRecord
{
    protected static string $resource = RetiradaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
