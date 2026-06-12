<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class EntradaEstoque extends Model
{
    protected $fillable = ['livro_id', 'usuario_id', 'quantidade', 'observacao'];

    protected static function booted(): void
    {
        static::creating(function (EntradaEstoque $entrada) {
            $entrada->usuario_id = Auth::id();
        });

        static::created(function (EntradaEstoque $entrada) {
            $livro = Livro::find($entrada->livro_id);
            $livro->increment('estoque', $entrada->quantidade);

            Notification::make()
                ->title('Entrada registrada com sucesso!')
                ->success()
                ->send();
        });
    }

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}