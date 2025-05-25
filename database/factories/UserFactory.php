<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'statusenabled' => true,
            'pegawaifk' => $this->faker->numberBetween(1, 10),
            'rolefk' => $this->faker->numberBetween(1, 5),
            'password' => '$2y$10$8Gk00WCQsQ1poHn5WFgvCOXDGUuq9.VBhbrLaJexfq76VF4wG1TmK', // 123123
            'remember_token' => Str::random(10)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
