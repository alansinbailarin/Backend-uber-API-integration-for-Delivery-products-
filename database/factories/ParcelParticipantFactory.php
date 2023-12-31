<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ParcelParticipant>
 */
class ParcelParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['sender', 'recipient']),
            'full_name' => fake()->name,
            'date_of_birth' => fake()->date,
            'age' => fake()->randomNumber(),
            'address' => fake()->address,
            'email' => fake()->email,
            'phone_number' => fake()->phoneNumber,
            'parcel_id' => fake()->numberBetween(1, 100),
        ];
    }
}
