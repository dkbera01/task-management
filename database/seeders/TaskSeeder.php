<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as FakerFactory;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        Project::all()->each(function ($project) use ($faker) {
            $maxPriority = Task::max('priority') ?? 0;

            // Create 10 tasks for each project
            for ($i = 1; $i <= 10; $i++) {
                Task::factory()->create([
                    'project_id' => $project->id,
                    'priority' => $maxPriority + $i,
                ]);
            }
        });
    }
}
