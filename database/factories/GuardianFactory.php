<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guardian>
 */
class GuardianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'grand_father_name' => $this->faker->lastName,
            'father_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'place_of_birth' => $this->faker->city,
            'date_of_birth' => $this->faker->date,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'tribe' => $this->faker->word,
            'religion' => $this->faker->word,
            'nin_no' => $this->faker->optional()->numerify('##########'),
            'nationality' => $this->faker->country,
            'relation' => $this->faker->word,
            'marital_status' => $this->faker->randomElement(['single', 'married','divorce']),
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'whatsapp_number' => $this->faker->optional()->phoneNumber,
            'work_place' => $this->faker->company,
            'occupation' => $this->faker->word,
            'postal_code' => $this->faker->optional()->postcode,
            'po_box' => $this->faker->optional()->word,
            // Add other fields as needed
        ];
        
    }
}
