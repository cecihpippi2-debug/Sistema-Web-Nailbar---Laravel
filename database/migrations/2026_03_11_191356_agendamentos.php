<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')
                ->constrained()
                ->onDelete('cascade'); // Chave estrangeira para a tabela clientes
            $table->foreignId('servico_id')
                ->constrained()
                ->onDelete('cascade'); // Chave estrangeira para a tabela servicos
            $table->date('data')->nullable();
            $table->time('hora')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
