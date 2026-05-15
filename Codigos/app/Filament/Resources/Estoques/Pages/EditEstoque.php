<?php

namespace App\Filament\Resources\EstoqueResource\Pages;

use App\Filament\Resources\EstoqueResource\Tables\EstoqueResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditEstoque extends EditRecord
{
    protected static string $resource = EstoqueResource::class;

    // ── Título da página ──────────────────────────────────
    protected function getHeaderHeading(): ?string
    {
        return 'Editar: ' . $this->record->titulo;
    }

    // ── Botões no cabeçalho ───────────────────────────────
    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make()
                ->label('Visualizar'),
            DeleteAction::make()
                ->label('Excluir'),
        ];
    }

    // ── Redireciona para lista após salvar ────────────────
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // ── Mensagem de sucesso personalizada ─────────────────
    protected function getSavedNotificationTitle(): ?string
    {
        return 'Produto atualizado com sucesso!';
    }
}
