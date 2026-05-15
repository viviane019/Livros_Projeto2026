<?php

namespace App\Filament\Resources\Catalogos;

use App\Filament\Resources\Catalogos\Pages\CreateCatalogo;
use App\Filament\Resources\Catalogos\Pages\EditCatalogo;
use App\Filament\Resources\Catalogos\Pages\ListCatalogos;
use App\Filament\Resources\Catalogos\Pages\ViewCatalogo;
use App\Filament\Resources\Catalogos\Schemas\CatalogoForm;
use App\Filament\Resources\Catalogos\Schemas\CatalogoInfolist;
use App\Filament\Resources\Catalogos\Tables\CatalogosTable;
use App\Models\Catalogo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CatalogoResource extends Resource
{
    protected static ?string $model = Catalogo::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Catalogo';

    public static function form(Schema $schema): Schema
    {
        return CatalogoForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CatalogoInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CatalogosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCatalogos::route('/'),
            'create' => CreateCatalogo::route('/create'),
            'view' => ViewCatalogo::route('/{record}'),
            'edit' => EditCatalogo::route('/{record}/edit'),
        ];
    }
}
