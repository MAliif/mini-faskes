<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Obat;

class ObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Obat::class;
    public function definition()
    {
        return [
            'nama_obat' => $this->faker->word(),
            'deskripsi' => $this->faker->sentence(),
            'jenis' => $this->faker->randomElement(['Tablet', 'Sirup', 'Salep', 'Kapsul', 'Injeksi']),
            'stok' => $this->faker->numberBetween(0, 100),
        ];
    }
}
