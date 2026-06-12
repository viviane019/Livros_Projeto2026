<?php
namespace App\Filament\Admin\Resources\Livros\Tables;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LivrosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titulo')->label('Título')->searchable()->sortable(),
                TextColumn::make('isbn')->label('ISBN'),
                TextColumn::make('materia')->label('Matéria')->searchable(),
                TextColumn::make('curso')->label('Curso')->searchable(),
                TextColumn::make('editora')->label('Editora'),
                TextColumn::make('estoque')->label('Estoque')->sortable(),
                TextColumn::make('quantidade_minima')->label('Mínimo'),
                TextColumn::make('status')->label('Status')->badge()
                    ->color(fn ($state) => $state ? 'success' : 'danger')
                    ->formatStateUsing(fn ($state) => $state ? 'Ativo' : 'Inativo'),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}