<?php

namespace App\Filament\Resources\Catalogos\Pages;

use App\Filament\Resources\Catalogos\CatalogoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCatalogo extends ViewRecord
{
    protected static string $resource = CatalogoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
                ->label('Editar Livro'),
            Actions\DeleteAction::make()
                ->label('Excluir Livro'),
        ];
    }
}