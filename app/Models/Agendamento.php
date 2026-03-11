<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;
    
    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function servico(){
        return $this->belongsTo(Servico::class);
    }
}


