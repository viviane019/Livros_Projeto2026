<?php

namespace App\Filament\Resources\Estoques\Schemas;

use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;

class EstoqueInfolist
{
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Section::make('Identificação')
                ->icon('heroicon-o-book-open')
                ->columns(3)
                ->schema([
                    ImageEntry::make('capa')
                        ->label('Capa')
                        ->height(160)
                        ->width(120)
                        ->defaultImageUrl(asset('images/book-placeholder.png')),

                    Grid::make(2)
                        ->columnSpan(2)
                        ->schema([
                            TextEntry::make('titulo')
                                ->label('Título')
                                ->size(TextEntry\TextEntrySize::Large)
                                ->weight(\Filament\Support\Enums\FontWeight::Bold)
                                ->columnSpanFull(),

                            TextEntry::make('autor')
                                ->label('Autor'),

                            TextEntry::make('isbn')
                                ->label('ISBN-13'),

                            TextEntry::make('codigo')
                                ->label('Código Interno')
                                ->badge()
                                ->color('gray'),

                            TextEntry::make('categoria')
                                ->label('Categoria')
                                ->badge()
                                ->color('info'),

                            TextEntry::make('materia')
                                ->label('Matéria / Disciplina'),

                            TextEntry::make('descricao')
                                ->label('Descrição')
                                ->columnSpanFull(),
                        ]),
                ]),

            Section::make('Estoque e Localização')
                ->icon('heroicon-o-archive-box')
                ->columns(4)
                ->schema([
                    TextEntry::make('quantidade')
                        ->label('Quantidade Atual')
                        ->suffix(' unidades')
                        ->size(TextEntry\TextEntrySize::Large)
                        ->weight(\Filament\Support\Enums\FontWeight::Bold),

                    TextEntry::make('quantidade_minima')
                        ->label('Qtd. Mínima')
                        ->suffix(' unidades'),

                    TextEntry::make('preco')
                        ->label('Preço Unitário')
                        ->prefix('R$ ')
                        ->numeric(decimalPlaces: 2),

                    TextEntry::make('status')
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
                        }),

                    TextEntry::make('local')
                        ->label('Localização'),

                    TextEntry::make('fornecedor')
                        ->label('Fornecedor'),

                    TextEntry::make('created_at')
                        ->label('Cadastrado em')
                        ->dateTime('d/m/Y H:i'),

                    TextEntry::make('updated_at')
                        ->label('Atualizado em')
                        ->dateTime('d/m/Y H:i'),
                ]),
        ]);
    }
}
