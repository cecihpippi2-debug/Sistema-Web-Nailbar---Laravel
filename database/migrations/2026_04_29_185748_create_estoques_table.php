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
        Schema::create('estoque', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            //$table->string('imagem')->after('nome')->nullable();
            $table->string('descricao')->nullable();
            $table->integer('quantidade');
            $table->float('preco')->nullable();


            $table->foreignId('categoria_id')
                ->constrained('categorias')
                ->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estoques');
    }
};
