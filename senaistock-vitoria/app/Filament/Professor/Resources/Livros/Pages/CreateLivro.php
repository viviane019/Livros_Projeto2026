<?php

namespace App\Filament\Professor\Resources\Livros\Pages;

use App\Filament\Professor\Resources\Livros\LivroResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLivro extends CreateRecord
{
    protected static string $resource = LivroResource::class;
}
