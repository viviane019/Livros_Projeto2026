<?php

namespace App\Filament\Professor\Resources\HistoricoMovimentacaos\Pages;

use App\Filament\Professor\Resources\HistoricoMovimentacaos\HistoricoMovimentacaoResource;
use Filament\Resources\Pages\ListRecords;

class ListHistoricoMovimentacaos extends ListRecords
{
    protected static string $resource = HistoricoMovimentacaoResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}