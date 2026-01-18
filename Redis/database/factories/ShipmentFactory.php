<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shipment>
 */
class ShipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['pending', 'in_transit', 'delivered', 'cancelled'];
        return [
            'title'        => $this->faker->sentence(3),
            'from_city'    => $this->faker->city(),
            'from_country' => $this->faker->country(),
            'to_city'      => $this->faker->city(),
            'to_country'   => $this->faker->country(),
            'price'        => $this->faker->numberBetween(10, 500),
            'status'       => $this->faker->randomElement($statuses),
            'user_id'      => User::factory(), // automatski kreira usera
            'details'      => $this->faker->paragraph(),
        ];
    }
}
