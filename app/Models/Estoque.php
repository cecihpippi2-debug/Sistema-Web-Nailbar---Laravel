<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;

     protected $table = 'estoque';

    protected $fillable = [
        'nome',
        'descricao',
        'quantidade',
        'preco',
        'categoria_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(CategoriaEstoque::class, 'categoria_id');
    }
}
