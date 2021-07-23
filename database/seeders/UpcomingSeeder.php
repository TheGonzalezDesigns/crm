<?php

namespace Database\Seeders;

use App\Models\Upcoming;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UpcomingSeeder extends Seeder
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
            Upcoming::create([
                'completed' => false,
                'title' => $faker->unique()->word,
                'taskId' => Str::random(10),
                'project_id' => $faker->randomDigitNotNull(),
                //'description' => $faker->unique()->text($maxNbChars = 200)
            ]);
        }
    }
}
