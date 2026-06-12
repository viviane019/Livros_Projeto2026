<?php
namespace App\Filament\Admin\Resources\Livros\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class LivroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('titulo')->label('Título')->required(),
            TextInput::make('isbn')->label('ISBN'),
            TextInput::make('materia')->label('Matéria')->required(),
            TextInput::make('curso')->label('Curso')->required(),
            TextInput::make('editora')->label('Editora'),
            TextInput::make('quantidade_minima')->label('Quantidade Mínima')->numeric()->default(10),
            TextInput::make('estoque')->label('Estoque Inicial')->numeric()->default(0),
            Toggle::make('status')->label('Ativo')->default(true),
        ]);
    }
}