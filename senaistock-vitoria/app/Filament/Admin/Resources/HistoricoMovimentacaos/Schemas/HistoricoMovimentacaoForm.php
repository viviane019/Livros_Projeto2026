<?php

namespace App\Filament\Admin\Resources\HistoricoMovimentacaos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class HistoricoMovimentacaoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('usuario_id')
                    ->required()
                    ->numeric(),
                TextInput::make('livro_id')
                    ->required()
                    ->numeric(),
                TextInput::make('tipo')
                    ->required(),
                TextInput::make('quantidade')
                    ->required()
                    ->numeric(),
                TextInput::make('turma'),
                Textarea::make('observacao')
                    ->columnSpanFull(),
            ]);
    }
}
