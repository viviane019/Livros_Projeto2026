<?php

namespace App\Filament\Admin\Resources\EstoqueCriticos\Pages;

use App\Filament\Admin\Resources\EstoqueCriticos\EstoqueCriticoResource;
use Filament\Resources\Pages\ListRecords;

class ListEstoqueCriticos extends ListRecords
{
    protected static string $resource = EstoqueCriticoResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}