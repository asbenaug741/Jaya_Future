<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'job_id' => Job::factory(),
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'cv' => 'cv/sample.pdf',
            'additional_file' => 'cv/additional.pdf',
            'cover_letter' => $this->faker->paragraph(3),
            'status' => $this->faker->randomElement(['in review', 'approved', 'rejected']),
            'application_date' => now(),
        ];
    }
}
