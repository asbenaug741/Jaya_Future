<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle,
            'job_kind' => $this->faker->randomElement(['Job', 'Internship', 'Training']),
            'company_name' => $this->faker->company,
            'location' => $this->faker->city,
            'category' => $this->faker->randomElement(['IT', 'Design']),
            'job_type' => $this->faker->randomElement(['On Site', 'Remote', 'Hybrid']),
            'description' => $this->faker->paragraph(5),
            'requirement' => $this->faker->paragraph(3),
            'benefit' => $this->faker->paragraph(2),
            'company_logo' => 'img/logo-default.png',
            'date_posted' => now(),
            'status' => $this->faker->randomElement(['Open', 'Paused', 'Closed']),
        ];
    }
}
