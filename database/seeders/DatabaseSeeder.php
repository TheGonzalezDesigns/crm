<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use Database\Factories\ProjectFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Project::factory(50)->has(
            Task::factory(rand(10,30))
        )->create();
    }
}
