<?php

namespace Database\Factories;

use App\Enums\LessonContentMediaTypeEnum;
use App\Models\Lesson;
use App\Models\LessonContent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LessonContent>
 */
class LessonContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'media_type' => LessonContentMediaTypeEnum::TEXT,
            'value' => fake()->realText(300),
            'lesson_id' => Lesson::get()->random()
        ];
    }
}
