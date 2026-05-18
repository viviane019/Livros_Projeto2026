<?php

namespace App\Filament\Resources\Estoques\Pages;

use App\Filament\Resources\Estoques\EstoqueResource;
use App\Models\Estoque;
use Filament\Actions\CreateAction;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListEstoques extends ListRecords
{
    protected static string $resource = EstoqueResource::class;

    protected function getHeaderHeading(): ?string
    {
        return 'Estoque de Livros';
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('+ Novo Produto')
                ->icon('heroicon-o-plus'),
        ];
    }

    public function getTabs(): array
    {
        return [
            'todos' => Tab::make('Todos')
                ->icon('heroicon-o-squares-2x2')
                ->badge(Estoque::count()),

            'em_estoque' => Tab::make('Em Estoque')
                ->icon('heroicon-o-check-circle')
                ->modifyQueryUsing(fn (Builder $query) =>
                    $query->where('status', 'em_estoque'))
                ->badge(Estoque::where('status', 'em_estoque')->count())
                ->badgeColor('success'),

            'estoque_baixo' => Tab::make('Estoque Baixo')
                ->icon('heroicon-o-exclamation-triangle')
                ->modifyQueryUsing(fn (Builder $query) =>
                    $query->where('status', 'estoque_baixo'))
                ->badge(Estoque::where('status', 'estoque_baixo')->count())
                ->badgeColor('warning'),

            'critico' => Tab::make('Crítico')
                ->icon('heroicon-o-x-circle')
                ->modifyQueryUsing(fn (Builder $query) =>
                    $query->where('status', 'critico'))
                ->badge(Estoque::where('status', 'critico')->count())
                ->badgeColor('danger'),

            'esgotado' => Tab::make('Esgotado')
                ->icon('heroicon-o-archive-box-x-mark')
                ->modifyQueryUsing(fn (Builder $query) =>
                    $query->where('status', 'esgotado'))
                ->badge(Estoque::where('status', 'esgotado')->count())
                ->badgeColor('gray'),
        ];
    }
}
