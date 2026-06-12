<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;

class UserForm
{
    public static function configure(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('re')
                    ->label('RE')
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('name')
                    ->label('Nome')
                    ->required(),
                TextInput::make('email')
                    ->label('E-mail')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('password')
                    ->label('Senha')
                    ->password()
                    ->required(fn ($record) => $record === null)
                    ->confirmed(),
                Select::make('perfil')
                    ->label('Perfil')
                    ->options([
                        'coordenador' => 'Coordenador',
                        'secretaria' => 'Secretaria',
                        'professor' => 'Professor',
                    ])
                    ->required(),
                Select::make('ativo')
                    ->label('Ativo')
                    ->options([
                        1 => 'Ativo',
                        0 => 'Inativo',
                    ])
                    ->default(1)
                    ->required(),
            ]);
    }
}