<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word,
            'description' => fake()->text(20),
            'qtd' => random_int(1, 200),
            'fornecedor' => 'Fornecedor '.$this->randomCharAZ(),
            'data_recebimento' => fake()->date(),
        ];
    }

    public static function randomCharAZ()
    {
        $characters = range('A', 'Z');

        return $characters[array_rand($characters)];
    }
}
