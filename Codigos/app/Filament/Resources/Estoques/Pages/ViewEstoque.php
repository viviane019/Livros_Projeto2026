<?php

namespace App\Filament\Resources\EstoqueResource\Pages;

use App\Filament\Resources\EstoqueResource\Tables\EstoqueResource;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\ViewRecord;

class ViewEstoque extends ViewRecord
{
    protected static string $resource = EstoqueResource::class;

    // ── Título da página ──────────────────────────────────
    protected function getHeaderHeading(): ?string
    {
        return $this->record->titulo;
    }

    // ── Botões no cabeçalho ───────────────────────────────
    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->label('Editar')
                ->icon('heroicon-o-pencil'),
            DeleteAction::make()
                ->label('Excluir')
                ->icon('heroicon-o-trash'),
        ];
    }
}
