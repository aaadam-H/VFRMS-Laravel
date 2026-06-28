<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $startDate = fake()->dateTimeBetween('-1 month', '+1 month');
        $endDate = fake()->dateTimeBetween($startDate, '+2 months');
        
        return [
            'user_id' => fake()->numberBetween(1, 11),
            'eventName' => fake()->sentence(2),
            'eventStartDate' => $startDate->format('Y-m-d'),
            'eventEndDate' => $endDate->format('Y-m-d'),
            'eventDesc' => fake()->sentence(10),
            'status' => fake()->randomElement(['ongoing', 'closed']),
            'regStartDate' => fake()->date(),
            'regEndDate' => fake()->date(),
            'fee' => fake()->randomFloat(2, 0, 100),
            'earlyFee' => fake()->randomFloat(2, 0, 100),
            'contactNumEvent' => fake()->phoneNumber(),
            'bankName' => fake()->company(),
            'accNumber' => fake()->bankAccountNumber(),
            'earlyFeeQt' => fake()->numberBetween(1, 100),
            'eventImg' => 'noEventImg.png',
        ];
    }
}
