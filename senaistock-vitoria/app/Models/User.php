<?php
namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use Notifiable;

    protected $fillable = ['re', 'name', 'email', 'password', 'perfil', 'ativo', 'senha_definida'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['senha_definida' => 'boolean', 'ativo' => 'boolean'];

public function canAccessPanel(Panel $panel): bool
{
    if (!$this->ativo) return false;

    return match($panel->getId()) {
        'admin' => $this->isCoordenador() || $this->isSecretaria() || $this->isProfessor(),
        default => false,
    };
}

    public function isCoordenador(): bool { return $this->perfil === 'coordenador'; }
    public function isSecretaria(): bool { return $this->perfil === 'secretaria'; }
    public function isProfessor(): bool { return $this->perfil === 'professor'; }

    public function entradasEstoque() { return $this->hasMany(EntradaEstoque::class, 'usuario_id'); }
    public function saidasEstoque() { return $this->hasMany(SaidaEstoque::class, 'professor_id'); }
    public function retiradas() { return $this->hasMany(Retirada::class, 'professor_id'); }
}