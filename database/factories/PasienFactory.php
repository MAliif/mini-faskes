<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pasien;

class PasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    protected $model = Pasien::class;
    public function definition()
    {
        return [
            'nocm' => $this->faker->unique()->numerify('########'),
            'nama' => $this->faker->name,
            'tgllahir' => $this->faker->date(),
            'jeniskelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
            'nohp' => $this->faker->phoneNumber,
        ];
    }
}
