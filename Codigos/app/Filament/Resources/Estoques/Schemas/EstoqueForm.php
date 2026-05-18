<?php

namespace App\Filament\Resources\Estoques\Schemas;

use App\Models\Estoque;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;

class EstoqueForm
{
    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Identificação do Livro / Material')
                ->description('Informações básicas do item no estoque.')
                ->icon('heroicon-o-book-open')
                ->columns(2)
                ->schema([
                    FileUpload::make('capa')
                        ->label('Capa do Livro')
                        ->image()
                        ->imageEditor()
                        ->directory('estoques/capas')
                        ->visibility('public')
                        ->columnSpanFull(),

                    TextInput::make('titulo')
                        ->label('Título')
                        ->placeholder('Ex: Manutenção Mecânica Industrial')
                        ->required()
                        ->maxLength(255)
                        ->columnSpanFull(),

                    TextInput::make('autor')
                        ->label('Autor')
                        ->placeholder('Ex: João da Silva')
                        ->maxLength(255),

                    TextInput::make('isbn')
                        ->label('ISBN-13')
                        ->placeholder('Ex: 9788595090803')
                        ->maxLength(20),

                    TextInput::make('codigo')
                        ->label('Código Interno')
                        ->placeholder('Ex: 00112')
                        ->required()
                        ->unique(Estoque::class, 'codigo', ignoreRecord: true)
                        ->maxLength(20),

                    Select::make('categoria')
                        ->label('Categoria / Eixo Tecnológico')
                        ->options(Estoque::categorias())
                        ->required()
                        ->searchable(),

                    TextInput::make('materia')
                        ->label('Matéria / Disciplina')
                        ->placeholder('Ex: Mecânica Industrial'),

                    Textarea::make('descricao')
                        ->label('Descrição')
                        ->placeholder('Breve descrição do conteúdo...')
                        ->rows(3)
                        ->columnSpanFull(),
                ]),

            Section::make('Estoque e Localização')
                ->description('Controle de quantidade, preço e local de armazenamento.')
                ->icon('heroicon-o-archive-box')
                ->columns(3)
                ->schema([
                    TextInput::make('quantidade')
                        ->label('Quantidade Atual')
                        ->numeric()
                        ->required()
                        ->minValue(0)
                        ->default(0)
                        ->suffix('unid.'),

                    TextInput::make('quantidade_minima')
                        ->label('Qtd. Mínima (Alerta)')
                        ->numeric()
                        ->required()
                        ->minValue(1)
                        ->default(10)
                        ->suffix('unid.')
                        ->helperText('Abaixo desse valor o status vira "Estoque Baixo"'),

                    TextInput::make('preco')
                        ->label('Preço Unitário')
                        ->numeric()
                        ->required()
                        ->minValue(0)
                        ->default(0)
                        ->prefix('R$'),

                    TextInput::make('local')
                        ->label('Localização')
                        ->placeholder('Ex: Estante A3, Depósito B')
                        ->maxLength(100),

                    TextInput::make('fornecedor')
                        ->label('Fornecedor')
                        ->placeholder('Ex: Editora SENAI-SP')
                        ->maxLength(255),
                ]),
        ]);
    }
}
