<?php

namespace Database\Factories;

use App\Models\Examination;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Examination>
 */
class ExaminationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'lesson_id' => Lesson::get()->random(),
            'min_score' => 50
        ];
    }
}
