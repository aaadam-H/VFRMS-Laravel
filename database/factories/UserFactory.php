<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'password' => Hash::make('1234'), // password
            'remember_token' => Str::random(10),
            'accType' => fake()->randomElement(['user', 'organizer']),
            'contactNumber' => fake()->phoneNumber(),
            'profilePic' => 'noProfilePic.png',
        ];
    }

    public function superAdmin(){
        return $this->state(function (array $attributes) {
            return [
                'name' => 'superAdmin',
                'email' => 'sAdmin@gmail.com',
                'password' => Hash::make('superAdmin123'),
                'accType' => 'superAdmin',
                'contactNumber' => '',
                'profilePic' => 'noProfilePic.png',
            ];
        });
    }

}
