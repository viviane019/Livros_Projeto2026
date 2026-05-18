<?php

namespace App\Filament\Resources\Estoques\Pages;

use App\Filament\Resources\Estoques\EstoqueResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEstoque extends CreateRecord
{
    protected static string $resource = EstoqueResource::class;

    protected function getHeaderHeading(): ?string
    {
        return 'Novo Produto / Livro';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Produto cadastrado com sucesso!';
    }
}
