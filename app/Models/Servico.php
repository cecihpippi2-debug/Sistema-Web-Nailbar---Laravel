<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $table = 'servicos';

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'imagem', 
        "decoracao_3d",
        'esmalte_especial',
    ];



    //public function agendamentos(){
    //return $this->hasMany(Agendamento::class);
} 
