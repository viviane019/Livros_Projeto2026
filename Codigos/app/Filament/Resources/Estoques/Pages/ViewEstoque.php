<?php

namespace App\Filament\Resources\Estoques\Pages;

use App\Filament\Resources\Estoques\EstoqueResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEstoque extends ViewRecord
{
    protected static string $resource = EstoqueResource::class;

    protected function getHeaderHeading(): ?string
    {
        return $this->record->titulo;
    }

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->label('Editar')
                ->icon('heroicon-o-pencil'),
            DeleteAction::make()
                ->label('Excluir')
                ->icon('heroicon-o-trash'),
        ];
    }
}
