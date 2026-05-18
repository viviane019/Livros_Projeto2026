<?php

namespace App\Filament\Resources\Catalogos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CatalogosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('capa')
                    ->label('Capa')
                    ->height(60),

                TextColumn::make('titulo')
                    ->label('Título')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('autor')
                    ->label('Autor')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('editora')
                    ->label('Editora')
                    ->sortable(),

                TextColumn::make('categoria')
                    ->label('Categoria')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'tecnico'      => 'info',
                        'didatico'     => 'success',
                        'referencia'   => 'warning',
                        'paradidatico' => 'primary',
                        default        => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'tecnico'      => 'Técnico',
                        'didatico'     => 'Didático',
                        'referencia'   => 'Referência',
                        'paradidatico' => 'Paradidático',
                        default        => 'Outro',
                    }),

                TextColumn::make('quantidade')
                    ->label('Qtd.')
                    ->sortable()
                    ->badge()
                    ->color(fn (int $state): string => match (true) {
                        $state === 0 => 'danger',
                        $state <= 5  => 'warning',
                        default      => 'success',
                    }),

                TextColumn::make('ano_publicacao')
                    ->label('Ano')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('categoria')
                    ->label('Categoria')
                    ->options([
                        'tecnico'      => 'Técnico',
                        'didatico'     => 'Didático',
                        'referencia'   => 'Referência',
                        'paradidatico' => 'Paradidático',
                        'outro'        => 'Outro',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('titulo');
    }
}
