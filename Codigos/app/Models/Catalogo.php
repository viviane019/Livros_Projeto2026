<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model
{
    protected $fillable = [
        'titulo',
        'autor',
        'isbn',
        'editora',
        'categoria',
        'ano_publicacao',
        'quantidade',
        'capa',
        'descricao',
    ];
}