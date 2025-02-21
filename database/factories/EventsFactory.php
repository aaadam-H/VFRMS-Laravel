<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Events>
 */
class EventsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween(1, 10),
            'eventName' => fake()->sentence(2),
            'eventStartDate' => fake()->date(),
            'eventEndDate' => fake()->date(),
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
