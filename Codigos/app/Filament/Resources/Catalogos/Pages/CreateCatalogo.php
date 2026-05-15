<?php

namespace App\Filament\Resources\Catalogos\Pages;

use App\Filament\Resources\Catalogos\CatalogoResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCatalogo extends CreateRecord
{
    protected static string $resource = CatalogoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Livro cadastrado com sucesso!';
    }
}