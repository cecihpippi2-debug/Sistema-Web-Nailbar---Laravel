<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'data_nascimento',
        'telefone',
        'email',
        'endereco',
        'categoria',
        'imagem', 
        'observacoes',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
    ];

    // Relacionamento 1 cliente para N agendamento
    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class);
    }
    // Relacionamento 1 cliente para N serviços
    public function servicos()
    {
        return $this->hasMany(Servico::class);
    }
}
