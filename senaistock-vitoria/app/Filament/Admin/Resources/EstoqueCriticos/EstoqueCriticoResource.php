<?php
namespace App\Filament\Admin\Resources\EstoqueCriticos;

use App\Models\Livro;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EstoqueCriticoResource extends Resource
{
    protected static ?string $model = Livro::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-exclamation-triangle';
    protected static ?string $navigationLabel = 'Estoque Crítico';
    protected static string|\UnitEnum|null $navigationGroup = 'Estoque';
    protected static ?int $navigationSort = 4;

    public static function canCreate(): bool { return false; }
    public static function canEdit($record): bool { return false; }
    public static function canDelete($record): bool { return false; }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titulo')->label('Livro'),
                TextColumn::make('estoque')->label('Saldo Atual'),
                TextColumn::make('quantidade_minima')->label('Mínimo'),
                TextColumn::make('estoque')
                    ->label('Status')
                    ->formatStateUsing(fn ($record) => $record->estoque < $record->quantidade_minima ? '🔴 Crítico' : '✅ Normal'),
            ])
            ->modifyQueryUsing(fn ($query) => $query->whereRaw('estoque < quantidade_minima'));
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListEstoqueCriticos::route('/')];
    }
}