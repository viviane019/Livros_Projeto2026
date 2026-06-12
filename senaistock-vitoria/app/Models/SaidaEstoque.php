<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class SaidaEstoque extends Model
{
    protected $fillable = ['livro_id', 'professor_id', 'usuario_id', 'turma', 'quantidade', 'observacao'];

    protected static function booted(): void
    {
        static::creating(function (SaidaEstoque $saida) {
            $saida->usuario_id = Auth::id();

            $livro = Livro::find($saida->livro_id);

            if ($livro->estoque < $saida->quantidade) {
                Notification::make()
                    ->title('Estoque insuficiente!')
                    ->body('Disponível: ' . $livro->estoque . ' unidades.')
                    ->danger()
                    ->send();

                throw ValidationException::withMessages([
                    'quantidade' => 'Estoque insuficiente. Disponível: ' . $livro->estoque,
                ]);
            }
        });

        static::created(function (SaidaEstoque $saida) {
            $livro = Livro::find($saida->livro_id);
            $livro->decrement('estoque', $saida->quantidade);

            Notification::make()
                ->title('Saída registrada com sucesso!')
                ->success()
                ->send();
        });
    }

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

    public function professor()
    {
        return $this->belongsTo(User::class, 'professor_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}