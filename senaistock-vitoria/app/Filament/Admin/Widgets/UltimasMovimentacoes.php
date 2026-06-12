<?php

namespace App\Filament\Admin\Widgets;

use App\Models\HistoricoMovimentacao;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class UltimasMovimentacoes extends BaseWidget
{
    protected static ?string $heading = 'Últimas Movimentações';
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                HistoricoMovimentacao::query()
                    ->with(['livro', 'usuario'])
                    ->latest()
                    ->limit(10)
            )
            ->columns([
                TextColumn::make('usuario.name')->label('Usuário'),
                TextColumn::make('livro.titulo')->label('Livro'),
                TextColumn::make('tipo')->label('Tipo')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'entrada' => 'success',
                        'saida' => 'warning',
                        'retirada' => 'info',
                        default => 'gray',
                    }),
                TextColumn::make('quantidade')->label('Quantidade'),
                TextColumn::make('turma')->label('Turma'),
                TextColumn::make('created_at')->label('Data/Hora')->dateTime()->sortable(),
            ]);
    }
}