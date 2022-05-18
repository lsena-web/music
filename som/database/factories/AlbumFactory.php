<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'file' => 'albuns/md3.png',
            'name' => $this->faker->name(),
            'artist' => $this->faker->name(),
            'gender' => $this->faker->name(),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 9)

        ];
    }
}
