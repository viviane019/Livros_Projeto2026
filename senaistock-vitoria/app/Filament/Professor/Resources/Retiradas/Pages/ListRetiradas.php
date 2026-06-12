<?php

namespace App\Filament\Professor\Resources\Retiradas\Pages;

use App\Filament\Professor\Resources\Retiradas\RetiradaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRetiradas extends ListRecords
{
    protected static string $resource = RetiradaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
