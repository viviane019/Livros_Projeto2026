<?php

namespace App\Filament\Admin\Resources\Livros\Pages;

use App\Filament\Admin\Resources\Livros\LivroResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLivro extends EditRecord
{
    protected static string $resource = LivroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
