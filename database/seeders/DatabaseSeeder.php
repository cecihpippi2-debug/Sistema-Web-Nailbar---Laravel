<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\Servico;
use App\Models\Agendamento;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ClientesSeeder::class,
            ServicosSeeder::class,
            AgendamentosSeeder::class,
        ]);
    }
}