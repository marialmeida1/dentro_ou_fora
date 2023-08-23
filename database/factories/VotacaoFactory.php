<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VotacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo'            => Str::random(8),
            'categoria_id'      => $this->faker->numberBetween(1, 2),
            'usuario_id'        => $this->faker->numberBetween(1, 10),
            'titulo'            => $this->faker->words(3, true),
            'descricao'         => $this->faker->sentence(),
            'datahora_inicio'   => $this->faker->dateTime(),
            'datahora_fim'      => $this->faker->dateTime(),
            'publica'           => true,
            'foto_capa'         => $this->faker->imageUrl(640, 480, 'animals', true),
        ];
    }
}
