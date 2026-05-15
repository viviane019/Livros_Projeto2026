<?php

namespace App\Filament\Resources\EstoqueResource\Pages;

use App\Filament\Resources\EstoqueResource\Tables\EstoqueResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEstoque extends CreateRecord
{
    protected static string $resource = EstoqueResource::class;

    // ── Título da página ──────────────────────────────────
    protected function getHeaderHeading(): ?string
    {
        return 'Novo Produto / Livro';
    }

    // ── Redireciona para lista após salvar ────────────────
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // ── Mensagem de sucesso personalizada ─────────────────
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Produto cadastrado com sucesso!';
    }
}
