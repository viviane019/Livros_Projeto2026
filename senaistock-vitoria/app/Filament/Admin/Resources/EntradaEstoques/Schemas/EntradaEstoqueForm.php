<?php

namespace App\Filament\Admin\Resources\EntradaEstoques\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EntradaEstoqueForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('livro_id')
                    ->required()
                    ->numeric(),
                TextInput::make('usuario_id')
                    ->required()
                    ->numeric(),
                TextInput::make('quantidade')
                    ->required()
                    ->numeric(),
                Textarea::make('observacao')
                    ->columnSpanFull(),
            ]);
    }
}
