<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->unique()->numberBetween(1,10),
            'name' => $this->faker->name,
            'address' => $this->faker->address,
            'date_of_birth' => $this->faker->date,
            'phone' =>$this->faker->phoneNumber
        ];
    }
}
