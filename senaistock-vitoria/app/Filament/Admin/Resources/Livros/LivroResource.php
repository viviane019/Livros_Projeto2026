<?php
namespace App\Filament\Admin\Resources\Livros;

use App\Filament\Admin\Resources\Livros\Pages\CreateLivro;
use App\Filament\Admin\Resources\Livros\Pages\EditLivro;
use App\Filament\Admin\Resources\Livros\Pages\ListLivros;
use App\Filament\Admin\Resources\Livros\Schemas\LivroForm;
use App\Filament\Admin\Resources\Livros\Tables\LivrosTable;
use App\Models\Livro;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class LivroResource extends Resource
{
    protected static ?string $model = Livro::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Livros';
    protected static string|\UnitEnum|null $navigationGroup = 'Estoque';
    protected static ?string $recordTitleAttribute = 'titulo';
    protected static ?int $navigationSort = 1;

    public static function canCreate(): bool { return auth()->user()->isCoordenador(); }
    public static function canEdit($record): bool { return auth()->user()->isCoordenador(); }
    public static function canDelete($record): bool { return auth()->user()->isCoordenador(); }

    public static function form(Schema $schema): Schema { return LivroForm::configure($schema); }
    public static function table(Table $table): Table { return LivrosTable::configure($table); }

    public static function getPages(): array
    {
        return [
            'index' => ListLivros::route('/'),
            'create' => CreateLivro::route('/create'),
            'edit' => EditLivro::route('/{record}/edit'),
        ];
    }
}