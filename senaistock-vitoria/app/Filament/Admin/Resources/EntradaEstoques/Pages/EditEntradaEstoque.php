<?php

namespace App\Filament\Admin\Resources\EntradaEstoques\Pages;

use App\Filament\Admin\Resources\EntradaEstoques\EntradaEstoqueResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEntradaEstoque extends EditRecord
{
    protected static string $resource = EntradaEstoqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
