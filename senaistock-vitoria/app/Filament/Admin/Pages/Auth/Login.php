<?php

namespace App\Filament\Admin\Pages\Auth;

use App\Models\User;
use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class Login extends Page implements HasForms
{
    use InteractsWithForms;
    
    protected string $view = 'filament.admin.pages.auth.login';
    protected static bool $shouldRegisterNavigation = false;
    
    public ?array $data = [
        're' => '',
        'password' => '',
    ];
    
    public function mount()
    {
        if (Auth::check()) {
            return redirect()->route('filament.admin.pages.dashboard');
        }
        
        $this->form->fill();
    }
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('re')
                    ->label('RE')
                    ->required()
                    ->autocomplete('username'),
                TextInput::make('password')
                    ->label('Senha')
                    ->password()
                    ->required(),
            ])
            ->statePath('data');
    }
    
   public function authenticate(\Illuminate\Http\Request $request)
{
    $request->validate([
        're' => 'required',
        'password' => 'required',
    ]);
    
    $user = User::where('re', $request->re)->first();
    
    if (!$user) {
        return back()->withErrors([
            're' => 'RE não encontrado.',
        ]);
    }
    
    if (!Hash::check($request->password, $user->password)) {
        return back()->withErrors([
            'password' => 'Senha incorreta.',
        ]);
    }
    
    if (!$user->ativo) {
        return back()->withErrors([
            're' => 'Usuário inativo.',
        ]);
    }
    
    Auth::login($user);
    $request->session()->regenerate();
    
    return redirect()->intended('/admin');
}
    
    public function getTitle(): string
    {
        return 'Login - SENAISTOCK';
    }
    
    // Método para renderizar a página
    public function render(): \Illuminate\View\View
    {
        return view($this->view, $this->getViewData());
    }
}