<?php

namespace App\Filament\Admin\Resources\SaidaEstoques\Pages;

use App\Filament\Admin\Resources\SaidaEstoques\SaidaEstoqueResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSaidaEstoques extends ListRecords
{
    protected static string $resource = SaidaEstoqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
