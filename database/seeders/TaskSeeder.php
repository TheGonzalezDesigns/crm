<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Q = rand(3,100);
        $I = rand(1,50);

        \App\Models\Task::factory($Q)->create(['project_id' => I]);
    }
}
