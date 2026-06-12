<?php

namespace App\Filament\Professor\Resources\HistoricoMovimentacaos;

use App\Models\HistoricoMovimentacao;
use App\Filament\Professor\Resources\HistoricoMovimentacaos\Pages;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HistoricoMovimentacaoResource extends Resource
{
    protected static ?string $model = HistoricoMovimentacao::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationLabel = 'Meu Histórico';
    protected static ?int $navigationSort = 3;

    public static function canCreate(): bool { return false; }
    public static function canEdit($record): bool { return false; }
    public static function canDelete($record): bool { return false; }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()->where('usuario_id', auth()->id());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
                TextColumn::make('created_at')->label('Data/Hora')->dateTime(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListHistoricoMovimentacaos::route('/')];
    }
}