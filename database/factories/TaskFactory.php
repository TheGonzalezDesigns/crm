<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Project;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();

        return [
            'project_id' => function() {
                return Project::factory()->create()->id;
            },
            'title' => $faker->unique()->word(),
            'description' => $faker->paragraph(3, 2),
            'completed' => false,
        ];
    }
}
