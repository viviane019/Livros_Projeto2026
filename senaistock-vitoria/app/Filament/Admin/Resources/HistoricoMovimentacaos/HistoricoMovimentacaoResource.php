<?php
namespace App\Filament\Admin\Resources\HistoricoMovimentacaos;

use App\Models\HistoricoMovimentacao;
use App\Filament\Admin\Resources\HistoricoMovimentacaos\Pages;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

class HistoricoMovimentacaoResource extends Resource
{
    protected static ?string $model = HistoricoMovimentacao::class;
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-clock';
    protected static ?string $navigationLabel = 'Histórico';
    public static function getNavigationGroup(): ?string { return 'Relatórios'; }
    protected static ?int $navigationSort = 1;

    public static function canCreate(): bool { return false; }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();
        if (auth()->user()->isProfessor()) {
            return $query->where('usuario_id', auth()->id());
        }
        return $query;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('usuario.name')->label('Usuário'),
                TextColumn::make('livro.titulo')->label('Livro'),
                TextColumn::make('tipo')->label('Tipo')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'entrada' => 'success',
                        'saida' => 'warning',
                        'retirada' => 'info',
                        default => 'gray',
                    }),
                TextColumn::make('quantidade')->label('Quantidade'),
                TextColumn::make('turma')->label('Turma'),
                TextColumn::make('created_at')->label('Data/Hora')->dateTime()->toggleable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->headerActions([
                ExportAction::make()->exports([
                    ExcelExport::make()->withColumns([
                        \pxlrbt\FilamentExcel\Columns\Column::make('usuario.name')->heading('Usuário'),
                        \pxlrbt\FilamentExcel\Columns\Column::make('livro.titulo')->heading('Livro'),
                        \pxlrbt\FilamentExcel\Columns\Column::make('tipo')->heading('Tipo'),
                        \pxlrbt\FilamentExcel\Columns\Column::make('quantidade')->heading('Quantidade'),
                        \pxlrbt\FilamentExcel\Columns\Column::make('turma')->heading('Turma'),
                        \pxlrbt\FilamentExcel\Columns\Column::make('created_at')->heading('Data/Hora'),
                    ])->withFilename('historico-' . date('d-m-Y')),
                ]),
            ])
            ->toolbarActions([
                ExportBulkAction::make()->exports([
                    ExcelExport::make()->withColumns([
                        \pxlrbt\FilamentExcel\Columns\Column::make('usuario.name')->heading('Usuário'),
                        \pxlrbt\FilamentExcel\Columns\Column::make('livro.titulo')->heading('Livro'),
                        \pxlrbt\FilamentExcel\Columns\Column::make('tipo')->heading('Tipo'),
                        \pxlrbt\FilamentExcel\Columns\Column::make('quantidade')->heading('Quantidade'),
                        \pxlrbt\FilamentExcel\Columns\Column::make('turma')->heading('Turma'),
                        \pxlrbt\FilamentExcel\Columns\Column::make('created_at')->heading('Data/Hora'),
                    ])->withFilename('historico-selecionados'),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListHistoricoMovimentacaos::route('/')];
    }
}