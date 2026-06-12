<?php
namespace App\Filament\Admin\Resources\SaidaEstoques;

use App\Models\SaidaEstoque;
use App\Filament\Admin\Resources\SaidaEstoques\Pages;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SaidaEstoqueResource extends Resource
{
    protected static ?string $model = SaidaEstoque::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-arrow-up-tray';
    protected static ?string $navigationLabel = 'Saída de Estoque';
    protected static string|\UnitEnum|null $navigationGroup = 'Estoque';
    protected static ?int $navigationSort = 3;

    public static function canViewAny(): bool
    {
        return in_array(auth()->user()->perfil, ['coordenador', 'secretaria']);
    }

    public static function canCreate(): bool
    {
        return in_array(auth()->user()->perfil, ['coordenador', 'secretaria']);
    }

    public static function canEdit($record): bool { return false; }
    public static function canDelete($record): bool { return false; }

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Select::make('livro_id')->relationship('livro', 'titulo')->required()->label('Livro'),
            Select::make('professor_id')
                ->relationship('professor', 'name')
                ->required()->label('Professor'),
            TextInput::make('turma')->required()->label('Turma'),
            TextInput::make('quantidade')->numeric()->required()->label('Quantidade'),
            Textarea::make('observacao')->label('Observação'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('livro.titulo')->label('Livro'),
            TextColumn::make('professor.name')->label('Professor'),
            TextColumn::make('turma')->label('Turma'),
            TextColumn::make('quantidade')->label('Quantidade'),
            TextColumn::make('created_at')->label('Data')->dateTime(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSaidaEstoques::route('/'),
            'create' => Pages\CreateSaidaEstoque::route('/create'),
        ];
    }
}