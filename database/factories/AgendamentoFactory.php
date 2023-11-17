<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        $dataAleatoria = $this->faker->dateTimeBetween('2023-11-17', '2023-11-30');
        $dataCom15Minutos = clone $dataAleatoria;
        $dataCom15Minutos->add(new \DateInterval('PT15M'));

        return [
            'title' => 'Prof. '.$this->faker->name,
            'start' => $dataAleatoria,
            'end' => $dataCom15Minutos,
            'allDay' => false,
            'extendedProps' => json_encode(['type' => 'agendamento']),
            'description' => $this->faker->text(25),
        ];
    }
}
