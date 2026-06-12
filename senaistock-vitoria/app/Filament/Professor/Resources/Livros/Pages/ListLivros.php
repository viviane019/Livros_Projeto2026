<?php

namespace App\Filament\Professor\Resources\Livros\Pages;

use App\Filament\Professor\Resources\Livros\LivroResource;
use Filament\Resources\Pages\ListRecords;

class ListLivros extends ListRecords
{
    protected static string $resource = LivroResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}