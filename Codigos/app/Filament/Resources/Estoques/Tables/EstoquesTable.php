<?php

namespace App\Filament\Resources\Estoques\Tables;

use App\Models\Estoque;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class EstoquesTable
{
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('capa')
                    ->label('Capa')
                    ->height(50)
                    ->width(38)
                    ->defaultImageUrl(asset('images/book-placeholder.png'))
                    ->rounded(),

                TextColumn::make('titulo')
                    ->label('Título (Autor)')
                    ->description(fn ($record) => $record->autor ?? '—')
                    ->searchable(['titulo', 'autor'])
                    ->sortable()
                    ->weight(\Filament\Support\Enums\FontWeight::Medium)
                    ->wrap(),

                TextColumn::make('isbn')
                    ->label('ISBN-13')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('ISBN copiado!')
                    ->color('gray'),

                TextColumn::make('categoria')
                    ->label('Categoria')
                    ->badge()
                    ->color('info')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('preco')
                    ->label('Preço')
                    ->money('BRL')
                    ->sortable(),

                TextColumn::make('quantidade')
                    ->label('Qtd. Atual')
                    ->suffix(' unid.')
                    ->sortable()
                    ->color(fn ($record) => match (true) {
                        $record->quantidade <= 0                              => 'danger',
                        $record->quantidade <= ($record->quantidade_minima * 0.3) => 'danger',
                        $record->quantidade <= $record->quantidade_minima    => 'warning',
                        default                                               => 'success',
                    })
                    ->weight(\Filament\Support\Enums\FontWeight::Bold),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'em_estoque'    => 'Em Estoque',
                        'estoque_baixo' => 'Estoque Baixo',
                        'critico'       => 'Crítico',
                        'esgotado'      => 'Esgotado',
                        default         => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'em_estoque'    => 'success',
                        'estoque_baixo' => 'warning',
                        'critico'       => 'danger',
                        'esgotado'      => 'gray',
                        default         => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('local')
                    ->label('Local')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('categoria')
                    ->label('Categoria')
                    ->options(Estoque::categorias())
                    ->searchable(),

                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'em_estoque'    => 'Em Estoque',
                        'estoque_baixo' => 'Estoque Baixo',
                        'critico'       => 'Crítico',
                        'esgotado'      => 'Esgotado',
                    ]),

                SelectFilter::make('local')
                    ->label('Localização / Depósito')
                    ->options(fn () =>
                        Estoque::query()
                            ->whereNotNull('local')
                            ->distinct()
                            ->pluck('local', 'local')
                            ->toArray()
                    ),
            ])
            ->filtersFormColumns(3)
            ->actions([
                ActionGroup::make([
                    ViewAction::make()
                        ->label('Visualizar')
                        ->icon('heroicon-o-eye'),
                    EditAction::make()
                        ->label('Editar')
                        ->icon('heroicon-o-pencil'),
                    DeleteAction::make()
                        ->label('Excluir')
                        ->icon('heroicon-o-trash'),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Excluir selecionados'),
                ]),
            ])
            ->defaultSort('titulo')
            ->striped()
            ->emptyStateIcon('heroicon-o-archive-box')
            ->emptyStateHeading('Nenhum item no estoque')
            ->emptyStateDescription('Clique em "Novo Produto" para adicionar o primeiro item.')
            ->searchPlaceholder('Buscar por título, autor, ISBN...');
    }
}
