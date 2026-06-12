<?php

namespace App\Filament\Admin\Resources\Livros\Pages;

use App\Filament\Admin\Resources\Livros\LivroResource;
use Filament\Resources\Pages\CreateRecord;

class CreateLivro extends CreateRecord
{
    protected static string $resource = LivroResource::class;
}
