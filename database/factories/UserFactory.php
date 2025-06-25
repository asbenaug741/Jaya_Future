<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'), // atau bcrypt('password')
            'birth_date' => $this->faker->date(),
            'university' => $this->faker->company,
            'phone_number' => $this->faker->phoneNumber,
            'profile_picture' => 'img/default.png',
            'role' => 'user', // atau 'admin'
            'employment_status' => $this->faker->randomElement(['employed', 'unemployed', 'freelance']),
            'job_title' => $this->faker->jobTitle,
            'location' => $this->faker->city,
            'resume' => 'resume/sample.pdf',
        ];
    }
}
