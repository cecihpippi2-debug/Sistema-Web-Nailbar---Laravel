<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $table ="agendamentos";

    protected $fillable = [
        'cliente_id',
        'servico_id',
        'data',
        'hora',
    ];

    protected $casts = [
    'cliente_id' => 'integer',
    'servico_id' => 'integer',
    'data' => 'date',
    ];
    
    // Relacionamento N agendamento para 1 cliente
    public function cliente(){
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
    // Relacionamento N agendamento para 1 serviço
    public function servico(){
        return $this->belongsTo(Servico::class, 'servico_id');
    }
}


