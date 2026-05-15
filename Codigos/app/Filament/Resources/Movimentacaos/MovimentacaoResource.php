<?php

namespace App\Filament\Resources\Movimentacaos;

use App\Filament\Resources\Movimentacaos\Pages\CreateMovimentacao;
use App\Filament\Resources\Movimentacaos\Pages\EditMovimentacao;
use App\Filament\Resources\Movimentacaos\Pages\ListMovimentacaos;
use App\Filament\Resources\Movimentacaos\Pages\ViewMovimentacao;
use App\Filament\Resources\Movimentacaos\Schemas\MovimentacaoForm;
use App\Filament\Resources\Movimentacaos\Schemas\MovimentacaoInfolist;
use App\Filament\Resources\Movimentacaos\Tables\MovimentacaosTable;
use App\Models\Movimentacao;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MovimentacaoResource extends Resource
{
    protected static ?string $model = Movimentacao::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Movimentação';

    public static function form(Schema $schema): Schema
    {
        return MovimentacaoForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MovimentacaoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MovimentacaosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMovimentacaos::route('/'),
            'create' => CreateMovimentacao::route('/create'),
            'view' => ViewMovimentacao::route('/{record}'),
            'edit' => EditMovimentacao::route('/{record}/edit'),
        ];
    }
}
