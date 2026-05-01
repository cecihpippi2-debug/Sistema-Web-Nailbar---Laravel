<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CategoriaEstoque;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estoque>
 */
class EstoqueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->word(),
            'descricao' => $this->faker->sentence(),
            'quantidade' => $this->faker->numberBetween(1, 100),
            'preco' => $this->faker->randomFloat(2, 1, 50),
            'categoria_id' => CategoriaEstoque::inRandomOrder()->first()->id ?? CategoriaEstoque::factory()
        ];
    }
}
