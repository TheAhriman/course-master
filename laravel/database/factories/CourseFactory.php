<?php

namespace Database\Factories;

use App\Models\AboutCourse;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->colorName(),
            'user_id' => 101,
            'about_course_id' => AboutCourse::get()->random()
        ];
    }
}
