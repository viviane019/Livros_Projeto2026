<?php

namespace App\Filament\Professor\Resources\Retiradas;

use App\Models\Retirada;
use App\Models\Livro;
use App\Filament\Professor\Resources\Retiradas\Pages;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RetiradaResource extends Resource
{
    protected static ?string $model = Retirada::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-arrow-down-tray';
    protected static ?string $navigationLabel = 'Registrar Retirada';
    protected static ?int $navigationSort = 2;

    public static function canEdit($record): bool { return false; }
    public static function canDelete($record): bool { return false; }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()->where('professor_id', auth()->id());
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Select::make('livro_id')
                ->label('Livro')
                ->options(Livro::where('status', true)->where('estoque', '>', 0)->pluck('titulo', 'id'))
                ->searchable()
                ->required(),
            TextInput::make('turma')
                ->label('Turma')
                ->required(),
            TextInput::make('quantidade')
                ->label('Quantidade')
                ->numeric()
                ->minValue(1)
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('livro.titulo')->label('Livro'),
                TextColumn::make('turma')->label('Turma'),
                TextColumn::make('quantidade')->label('Quantidade'),
                TextColumn::make('created_at')->label('Data')->dateTime(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRetiradas::route('/'),
            'create' => Pages\CreateRetirada::route('/create'),
        ];
    }
}