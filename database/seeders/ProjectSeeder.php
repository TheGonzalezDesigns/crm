<?php

namespace Database\Seeders;

use App\Models\Projects;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 0; $i<10; $i++) {
            Projects::create([
                'completed' => false,
                'title' => $faker->unique()->word,
                'description' => $faker->unique()->text($maxNbChars = 200)
                //'PID' => Str::random(10),
            ]);
        }
    }
}
