<?php

namespace App\Filament\Professor\Resources\Retiradas\Pages;

use App\Filament\Professor\Resources\Retiradas\RetiradaResource;
use App\Models\HistoricoMovimentacao;
use Filament\Resources\Pages\CreateRecord;

class CreateRetirada extends CreateRecord
{
    protected static string $resource = RetiradaResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['professor_id'] = auth()->id();
        return $data;
    }

protected function afterCreate(): void
{
    try {
        HistoricoMovimentacao::create([
            'usuario_id' => auth()->id(),
            'livro_id'   => $this->record->livro_id,
            'tipo'       => 'retirada',
            'quantidade' => $this->record->quantidade,
            'turma'      => $this->record->turma,
        ]);
    } catch (\Exception $e) {
        \Log::error('Erro ao salvar histórico: ' . $e->getMessage());
    }
}

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}