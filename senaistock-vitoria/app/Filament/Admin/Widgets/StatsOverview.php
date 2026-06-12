<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Livro;
use App\Models\HistoricoMovimentacao;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total de Livros', Livro::count())
                ->icon('heroicon-o-book-open')
                ->color('info'),

            Stat::make('Quantidade em Estoque', Livro::sum('estoque'))
                ->icon('heroicon-o-archive-box')
                ->color('success'),

            Stat::make('Estoque Crítico', Livro::whereRaw('estoque < quantidade_minima')->count())
                ->icon('heroicon-o-exclamation-triangle')
                ->color('danger'),

            Stat::make('Movimentações do Mês', HistoricoMovimentacao::whereMonth('created_at', now()->month)->count())
                ->icon('heroicon-o-arrow-path')
                ->color('warning'),
        ];
    }
}