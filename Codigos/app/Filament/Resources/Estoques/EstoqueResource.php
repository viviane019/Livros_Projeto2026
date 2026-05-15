<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstoqueResource\Pages;
use App\Filament\Resources\EstoqueResource\Schemas\EstoqueForm;
use App\Filament\Resources\EstoqueResource\Schemas\EstoqueInfolist;
use App\Filament\Resources\EstoqueResource\Tables\EstoquesTable;
use App\Models\Estoque;
use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Table;

class EstoqueResource extends Resource
{
    // ── Modelo vinculado ─────────────────────────────────
    protected static ?string $model = Estoque::class;

    // ── Ícone no menu lateral ─────────────────────────────
    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    // ── Rótulos em português ──────────────────────────────
    protected static ?string $navigationLabel    = 'Estoque';
    protected static ?string $modelLabel         = 'Item do Estoque';
    protected static ?string $pluralModelLabel   = 'Estoques';
    protected static ?string $navigationGroup    = 'Menu Principal';
    protected static ?int    $navigationSort     = 2;

    // ── Badge com total de itens críticos ─────────────────
    public static function getNavigationBadge(): ?string
    {
        $criticos = Estoque::whereIn('status', ['critico', 'esgotado'])->count();
        return $criticos > 0 ? (string) $criticos : null;
    }

    public static function getNavigationBadgeColor(): string
    {
        return 'danger';
    }

    // ── FORM ─────────────────────────────────────────────
    public static function form(Form $form): Form
    {
        return EstoqueForm::form($form);
    }

    // ── INFOLIST (tela de visualização) ───────────────────
    public static function infolist(Infolist $infolist): Infolist
    {
        return EstoqueInfolist::infolist($infolist);
    }

    // ── TABLE ─────────────────────────────────────────────
    public static function table(Table $table): Table
    {
        return EstoquesTable::table($table);
    }

    // ── PÁGINAS ───────────────────────────────────────────
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
