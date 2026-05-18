<?php

namespace App\Filament\Resources\Estoques\Pages;

use App\Filament\Resources\Estoques\EstoqueResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditEstoque extends EditRecord
{
    protected static string $resource = EstoqueResource::class;

    protected function getHeaderHeading(): ?string
    {
        return 'Editar: ' . $this->record->titulo;
    }

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make()
                ->label('Visualizar'),
            DeleteAction::make()
                ->label('Excluir'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Produto atualizado com sucesso!';
    }
}
