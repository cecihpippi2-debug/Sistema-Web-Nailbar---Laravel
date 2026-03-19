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
    
    public function cliente(){
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function servico(){
        return $this->belongsTo(Servico::class, 'servico_id');
    }
}


