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
        'cliente_id', //chave estrangeira nullable()
    ];

    protected $casts = [
        'decoracao_3d' => 'boolean',
        'esmalte_especial' => 'boolean',
        'preco' => 'float',
    ];
    

    // Relacionamento 1 serviço para N agendamento
    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class);
    }

    // Relacionamento N serviços para 1 cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
} 
