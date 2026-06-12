<?php

namespace App\Filament\Admin\Resources\SaidaEstoques\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SaidaEstoqueForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('livro_id')
                    ->required()
                    ->numeric(),
                TextInput::make('professor_id')
                    ->required()
                    ->numeric(),
                TextInput::make('turma')
                    ->required(),
                TextInput::make('quantidade')
                    ->required()
                    ->numeric(),
                Textarea::make('observacao')
                    ->columnSpanFull(),
            ]);
    }
}
