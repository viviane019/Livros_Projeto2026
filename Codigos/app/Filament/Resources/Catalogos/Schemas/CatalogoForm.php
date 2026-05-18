<?php

namespace App\Filament\Resources\Catalogos\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CatalogoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informações do Livro')
                    ->schema([
                        TextInput::make('titulo')
                            ->label('Título do Livro')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2),

                        TextInput::make('autor')
                            ->label('Autor')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('isbn')
                            ->label('ISBN')
                            ->unique(ignoreRecord: true)
                            ->maxLength(20),

                        TextInput::make('editora')
                            ->label('Editora')
                            ->maxLength(255),

                        TextInput::make('ano_publicacao')
                            ->label('Ano de Publicação')
                            ->numeric()
                            ->minValue(1900)
                            ->maxValue(date('Y')),

                        Select::make('categoria')
                            ->label('Categoria')
                            ->required()
                            ->options([
                                'tecnico'      => 'Técnico',
                                'didatico'     => 'Didático',
                                'referencia'   => 'Referência',
                                'paradidatico' => 'Paradidático',
                                'outro'        => 'Outro',
                            ])
                            ->searchable(),

                        TextInput::make('quantidade')
                            ->label('Quantidade em Estoque')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->default(0),

                        FileUpload::make('capa')
                            ->label('Capa do Livro')
                            ->image()
                            ->directory('capas')
                            ->columnSpan(2),

                        Textarea::make('descricao')
                            ->label('Descrição')
                            ->rows(4)
                            ->columnSpan(2),
                    ])
                    ->columns(2),
            ]);
    }
}
                //
            ]);
    }
}
