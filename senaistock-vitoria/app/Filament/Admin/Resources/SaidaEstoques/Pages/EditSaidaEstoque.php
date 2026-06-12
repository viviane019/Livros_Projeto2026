<?php

namespace App\Filament\Admin\Resources\SaidaEstoques\Pages;

use App\Filament\Admin\Resources\SaidaEstoques\SaidaEstoqueResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSaidaEstoque extends EditRecord
{
    protected static string $resource = SaidaEstoqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
