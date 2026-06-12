<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricoMovimentacao extends Model
{
    protected $fillable = ['usuario_id', 'livro_id', 'tipo', 'quantidade', 'turma', 'observacao'];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }
}