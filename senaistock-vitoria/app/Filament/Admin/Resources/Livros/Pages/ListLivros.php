<?php

namespace App\Filament\Admin\Resources\Livros\Pages;

use App\Filament\Admin\Resources\Livros\LivroResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLivros extends ListRecords
{
    protected static string $resource = LivroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
