<?php
namespace App\Filament\Admin\Pages\Auth;

use App\Models\User;
use Filament\Pages\SimplePage;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Hash;

class PrimeiroAcesso extends SimplePage
{
    protected string $view = 'filament.admin.pages.auth.primeiro-acesso';
    protected static bool $shouldRegisterNavigation = false;

    public string $re = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function mount(): void
    {
        $this->re = request()->query('re', '');
    }

    public function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('re')
                ->label('RE')
                ->required()
                ->disabled()
                ->default($this->re),
            TextInput::make('password')
                ->label('Nova Senha')
                ->password()
                ->required()
                ->minLength(6),
            TextInput::make('password_confirmation')
                ->label('Confirmar Senha')
                ->password()
                ->required()
                ->same('password'),
        ]);
    }

    public function ativar(): void
    {
        $data = $this->form->getState();

        $user = User::where('re', $this->re)->firstOrFail();

        $user->update([
            'password' => Hash::make($data['password']),
            'senha_definida' => true,
        ]);

        redirect()->to('/admin/login')->send();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('ativar')
                ->label('Ativar Conta')
                ->submit('ativar'),
        ];
    }
}