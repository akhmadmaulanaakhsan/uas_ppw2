<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Buku;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    protected $model = Buku::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->sentence,
            'penulis' => $this->faker->name,
            'harga' => $this->faker->randomFloat(2, 1000, 1000000),
            'tgl_terbit' => $this->faker->date,
        ];
    }
}
