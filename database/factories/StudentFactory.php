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
            'grand_father_name' => $this->faker->firstName,
            'father_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'place_of_birth' => $this->faker->city,
            'dob' => $this->faker->date,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'tribe' => $this->faker->word,
            'religion' => $this->faker->word,
            'nin_no' => $this->faker->optional()->numerify('##########'),
            'nationality' => $this->faker->country,
            'image' => $this->faker->image('public/storage/images'),
            // Add other fields as needed
        ];
    }
}
