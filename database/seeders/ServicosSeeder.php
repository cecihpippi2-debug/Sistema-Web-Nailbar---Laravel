<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Servico;

class ServicosSeeder extends Seeder
{
    public function run(): void
    {
        Servico::factory()->count(10)->create();
    }
}
