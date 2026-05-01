<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaEstoque extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = [
        'nome',
        'descricao',
        'premium'
    ];

    // Relacionamento 1 -> n 
    public function estoques()
    {
        return $this->hasMany(Estoque::class, 'categoria_id');
    }
}
