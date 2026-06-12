<?php

namespace App\Filament\Professor\Resources\Livros;

use App\Models\Livro;
use App\Filament\Professor\Resources\Livros\Pages;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;

class LivroResource extends Resource
{
    protected static ?string $model = Livro::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Catálogo';
    protected static ?int $navigationSort = 1;

    public static function canCreate(): bool { return false; }
    public static function canEdit($record): bool { return false; }
    public static function canDelete($record): bool { return false; }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titulo')->label('Título')->searchable(),
                TextColumn::make('materia')->label('Matéria'),
                TextColumn::make('curso')->label('Curso'),
                TextColumn::make('editora')->label('Editora'),
                TextColumn::make('estoque')->label('Estoque'),
                TextColumn::make('status')->label('Status')->badge()
    ->formatStateUsing(fn ($state) => $state ? 'Ativo' : 'Inativo')
    ->color(fn ($state): string => $state ? 'success' : 'gray'),
            ])
            ->defaultSort('titulo');
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListLivros::route('/')];
    }
}