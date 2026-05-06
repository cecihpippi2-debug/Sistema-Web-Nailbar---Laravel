<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cliente;
use App\Models\Servico;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agendamento>
 */
class AgendamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cliente_id' => (Cliente::All()->random())->id,
            'servico_id' => (Servico::All()->random())->id,
            'data' => $this->faker->dateTimeBetween('2026-01-01', '2026-12-31'),
            'hora' => $this->faker->time(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
