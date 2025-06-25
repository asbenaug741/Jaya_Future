<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tag;
use App\Models\Job;
use App\Models\Application;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Users
        // User::factory(10)->create();
        $this->call(AdminSeeder::class);

        // Seed Tags
        $tags = Tag::factory(10)->create();

        // Seed Jobs
        Job::factory(10)->create()->each(function ($job) use ($tags) {
            // Attach 1-3 random tags ke tiap job
            $job->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        // Seed Applications
        Application::factory(20)->create();
    }
}
