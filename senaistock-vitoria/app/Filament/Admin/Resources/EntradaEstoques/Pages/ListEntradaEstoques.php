<?php

namespace App\Filament\Admin\Resources\EntradaEstoques\Pages;

use App\Filament\Admin\Resources\EntradaEstoques\EntradaEstoqueResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEntradaEstoques extends ListRecords
{
    protected static string $resource = EntradaEstoqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
