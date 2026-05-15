<?php

namespace App\Filament\Resources\Movimentacaos\Pages;

use App\Filament\Resources\Movimentacaos\MovimentacaoResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMovimentacao extends ViewRecord
{
    protected static string $resource = MovimentacaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
