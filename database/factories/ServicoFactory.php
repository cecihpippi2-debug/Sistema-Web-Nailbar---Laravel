<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Servico>
 */
class ServicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
return [

            'nome' => fake()->randomElement([
                'Manicure Tradicional',
                'Pedicure',
                'Alongamento em Gel',
                'Manutenção de Gel',
                'Spa dos Pés',
                'Nail Art 3D'
            ]),

            'descricao' => $this->faker->sentence(),
            'preco' => $this->faker->randomFloat(2, 30, 150),
            'decoracao_3d' => $this->faker->boolean(),
            'esmalte_especial' => $this->faker->boolean(),
            'cliente_id' => \App\Models\Cliente::factory(),
            'imagem' => null,

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
