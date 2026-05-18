<?php

namespace App\Filament\Resources\Catalogos\Pages;

use App\Filament\Resources\Catalogos\CatalogoResource;

use Filament\Actions;

use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCatalogo extends EditRecord
{
    protected static string $resource = CatalogoResource::class;

    protected function getHeaderActions(): array
    {
        return [

            Actions\DeleteAction::make()
                ->label('Excluir Livro'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Livro atualizado com sucesso!';
    }
}

            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}

