<?php
namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('re')
                    ->label('RE')
                    ->required(),
                TextInput::make('name')
                    ->label('Nome')
                    ->required(),
                TextInput::make('email')
                    ->label('E-mail')
                    ->email()
                    ->required(),
                TextInput::make('password')
                ->label('Senha')
                ->password()
                ->required()
                ->visibleOn('create'), // já está assim, está correto!
                    
                Select::make('perfil')
                    ->label('Perfil')
                    ->options([
                        'coordenador' => 'Coordenador',
                        'secretaria' => 'Secretaria',
                        'professor' => 'Professor',
                    ])
                    ->required()
                    ->default('professor'),
                Toggle::make('ativo')
                    ->label('Ativo')
                    ->default(true),
            ]);
    }
}