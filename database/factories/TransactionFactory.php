<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence,
            'transaction_status' => fake()->randomElement(['open', 'closed']),
            'transaction_code' => fake()->uuid,
            // 'amount' => fake()->randomFloat(2, 0, 9999.99),
            // 'payment_status' => fake()->randomElement(['pending', 'paid']),
            // 'delivery_status' => fake()->randomElement(['pending', 'delivered']),
            // 'tracking_url' => fake()->url,
            // 'pickup_address' => fake()->address,
            // 'pickup_name' => fake()->name,
            // 'pickup_phone_number' => fake()->phoneNumber,
            // 'pickup_latitude' => fake()->latitude,
            // 'pickup_longitude' => fake()->longitude,
            // 'dropoff_address' => fake()->address,
            // 'dropoff_name' => fake()->name,
            // 'dropoff_phone_number' => fake()->phoneNumber,
            // 'dropoff_latitude' => fake()->latitude,
            // 'dropoff_longitude' => fake()->longitude,
            // 'confirmation_image' => fake()->imageUrl(),
            // 'confirmation_buyer' => fake()->imageUrl(),
            // 'confirmation_seller' => fake()->imageUrl(),
            // 'buyer_id' => fake()->numberBetween(1, 100),
            // 'seller_id' => fake()->numberBetween(1, 100),
            'user_id' => fake()->numberBetween(1, 100),
            'parcel_participants_id' => fake()->numberBetween(1, 10),
        ];
    }
}
