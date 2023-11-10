<?php

namespace Database\Factories;

use App\Models\AboutCourse;
use Illuminate\Database\Eloquent\Factories\Factory;

class AboutCourseFactory extends Factory
{
	protected $model = AboutCourse::class;

	public function definition(): array
	{
		return [
            'audience' => fake()->text(),
            'requirements' => fake()->text(),
            'value' => fake()->text()
		];
	}
}
