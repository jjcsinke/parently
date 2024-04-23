<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Child>
 */
class ChildFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName,
            'date_of_birth' => random_int(0,100) > 25 ? fake()->dateTimeBetween('-18 years', '-1 day') : null,
        ];
    }
}
