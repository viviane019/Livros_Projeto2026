<?php

namespace App\Filament\Resources\Sistemas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SistemaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
