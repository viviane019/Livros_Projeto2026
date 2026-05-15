// app/Filament/Resources/Catalogos/CatalogoResource.php
<?php

namespace App\Filament\Resources\Catalogos;

use App\Filament\Resources\Catalogos\Pages\CreateCatalogo;
use App\Filament\Resources\Catalogos\Pages\EditCatalogo;
use App\Filament\Resources\Catalogos\Pages\ListCatalogos;
use App\Models\Catalogo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CatalogoResource extends Resource
{
    protected static ?string $model = Catalogo::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    protected static ?string $navigationLabel = 'Catálogo de Estoque';

    protected static ?string $modelLabel = 'Produto';

    protected static ?string $pluralModelLabel = 'Produtos';

    protected static ?string $navigationGroup = 'Estoque';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informações do Produto')
                ->schema([
                    Forms\Components\TextInput::make('nome')
                        ->label('Nome do Produto')
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(2),

                    Forms\Components\TextInput::make('codigo_sku')
                        ->label('Código / SKU')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(100),

                    Forms\Components\Select::make('categoria')
                        ->label('Categoria')
                        ->required()
                        ->options([
                            'eletronicos'    => 'Eletrônicos',
                            'moveis'         => 'Móveis',
                            'vestuario'      => 'Vestuário',
                            'alimentos'      => 'Alimentos',
                            'ferramentas'    => 'Ferramentas',
                            'outros'         => 'Outros',
                        ])
                        ->searchable(),

                    Forms\Components\TextInput::make('quantidade')
                        ->label('Quantidade em Estoque')
                        ->required()
                        ->numeric()
                        ->minValue(0)
                        ->default(0),

                    Forms\Components\Textarea::make('descricao')
                        ->label('Descrição')
                        ->rows(4)
                        ->columnSpan(2),
                ])
                ->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('codigo_sku')
                    ->label('SKU')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('nome')
                    ->label('Nome do Produto')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('categoria')
                    ->label('Categoria')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'eletronicos' => 'info',
                        'moveis'      => 'warning',
                        'vestuario'   => 'success',
                        'alimentos'   => 'danger',
                        'ferramentas' => 'primary',
                        default       => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'eletronicos' => 'Eletrônicos',
                        'moveis'      => 'Móveis',
                        'vestuario'   => 'Vestuário',
                        'alimentos'   => 'Alimentos',
                        'ferramentas' => 'Ferramentas',
                        default       => 'Outros',
                    }),

                Tables\Columns\TextColumn::make('quantidade')
                    ->label('Qtd. Estoque')
                    ->sortable()
                    ->badge()
                    ->color(fn (int $state): string => match (true) {
                        $state === 0  => 'danger',
                        $state <= 10  => 'warning',
                        default       => 'success',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('categoria')
                    ->label('Categoria')
                    ->options([
                        'eletronicos' => 'Eletrônicos',
                        'moveis'      => 'Móveis',
                        'vestuario'   => 'Vestuário',
                        'alimentos'   => 'Alimentos',
                        'ferramentas' => 'Ferramentas',
                        'outros'      => 'Outros',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListCatalogos::route('/'),
            'create' => CreateCatalogo::route('/create'),
            'edit'   => EditCatalogo::route('/{record}/edit'),
        ];
    }
}