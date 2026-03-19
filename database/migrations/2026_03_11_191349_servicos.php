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
        Schema::create('servicos', function (Blueprint $table) {

        $table->id();

        $table->string('nome');
        $table->text('descricao')->nullable();
        $table->float('preco');
        $table->string('imagem')->nullable();
        $table->boolean('decoracao_3d')->default(false);
        $table->boolean('esmalte_especial')->default(false);
        $table->string('imagem')->nullable();
    
        $table->timestamps();
});
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
