<?php
namespace App\Filament\Admin\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nome')->searchable(),
                TextColumn::make('email')->label('E-mail')->searchable(),
                TextColumn::make('perfil')->label('Perfil')->badge()
                    ->color(fn ($state) => match($state) {
                        'coordenador' => 'success',
                        'secretaria' => 'info',
                        'professor' => 'warning',
                        default => 'gray',
                    }),
                TextColumn::make('re')->label('RE')->searchable(),
                TextColumn::make('ativo')->label('Ativo')->badge()
                    ->color(fn ($state) => $state ? 'success' : 'danger')
                    ->formatStateUsing(fn ($state) => $state ? 'Ativo' : 'Inativo'),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
                Action::make('toggleAtivo')
                    ->label(fn ($record) => $record->ativo ? 'Desativar' : 'Ativar')
                    ->icon(fn ($record) => $record->ativo ? 'heroicon-o-x-circle' : 'heroicon-o-check-circle')
                    ->color(fn ($record) => $record->ativo ? 'danger' : 'success')
                    ->requiresConfirmation()
                    ->visible(fn () => auth()->user()->isCoordenador())
                    ->action(fn ($record) => $record->update(['ativo' => !$record->ativo])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([]),
            ]);
    }
}