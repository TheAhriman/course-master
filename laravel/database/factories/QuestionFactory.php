<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\QuestionGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Question>
 */
class QuestionFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question' => fake()->title,
            'type' => 1,
            'priority' => 1,
            'required' => true,
            'question_group_id' => QuestionGroup::get()->random(),
            'score' => 25
        ];
    }
}
