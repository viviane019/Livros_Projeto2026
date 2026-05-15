<?php

namespace App\Filament\Resources\Sistemas\Pages;

use App\Filament\Resources\Sistemas\SistemaResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSistema extends EditRecord
{
    protected static string $resource = SistemaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
