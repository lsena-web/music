<?php

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Musica>
 */
class MusicaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $min =  Album::first()->id;
        $max =  Album::orderBy('id', 'desc')->first()->id;
        return [
            'albuns_id' => rand($min, $max),
            'name' => $this->faker->name(),
            'durable' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 6) . 'min',
        ];
    }
}
