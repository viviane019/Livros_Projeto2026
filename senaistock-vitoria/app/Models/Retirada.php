<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retirada extends Model
{
    protected $fillable = ['livro_id', 'professor_id', 'turma', 'quantidade'];

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

    public function professor()
    {
        return $this->belongsTo(User::class, 'professor_id');
    }
}