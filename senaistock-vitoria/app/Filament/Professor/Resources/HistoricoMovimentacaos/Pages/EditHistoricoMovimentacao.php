<?php

namespace App\Filament\Professor\Resources\HistoricoMovimentacaos\Pages;

use App\Filament\Professor\Resources\HistoricoMovimentacaos\HistoricoMovimentacaoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHistoricoMovimentacao extends EditRecord
{
    protected static string $resource = HistoricoMovimentacaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
