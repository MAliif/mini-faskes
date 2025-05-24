<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pegawai;

class PegawaiFactory extends Factory
{
    protected $model = Pegawai::class;

    public function definition()
    {
        return [
            'namalengkap' => $this->faker->name,
            'jeniskelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
            'rolefk' => $this->faker->numberBetween(1, 4), // assuming 4 roles
        ];
    }
}
