<?php

namespace App\Filament\Resources\Estoques;

use App\Filament\Resources\Estoques\Pages;
use App\Filament\Resources\Estoques\Schemas\EstoqueForm;
use App\Filament\Resources\Estoques\Schemas\EstoqueInfolist;
use App\Filament\Resources\Estoques\Tables\EstoquesTable;
use App\Models\Estoque;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Table;

class EstoqueResource extends Resource
{
    protected static ?string $model = Estoque::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationLabel = 'Estoque';
    protected static ?string $modelLabel = 'Item do Estoque';
    protected static ?string $pluralModelLabel = 'Estoques';
    protected static ?string $navigationGroup = 'Menu Principal';
    protected static ?int $navigationSort = 2;

    public static function getNavigationBadge(): ?string
    {
        $criticos = Estoque::whereIn('status', ['critico', 'esgotado'])->count();
        return $criticos > 0 ? (string) $criticos : null;
    }

    public static function getNavigationBadgeColor(): string
    {
        return 'danger';
    }

    public static function form(Form $form): Form
    {
        return EstoqueForm::form($form);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return EstoqueInfolist::infolist($infolist);
    }

    public static function table(Table $table): Table
    {
        return EstoquesTable::table($table);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListEstoques::route('/'),
            'create' => Pages\CreateEstoque::route('/create'),
            'view'   => Pages\ViewEstoque::route('/{record}'),
            'edit'   => Pages\EditEstoque::route('/{record}/edit'),
        ];
    }
}
