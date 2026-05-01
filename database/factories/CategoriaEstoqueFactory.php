<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoriaEstoque>
 */
class CategoriaEstoqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->randomElement(['Esmaltes', 'Acessórios', 'Decorações']),
            'descricao' => $this->faker->sentence(),
            'premium' => $this->faker->boolean()
        ];
    }
}
