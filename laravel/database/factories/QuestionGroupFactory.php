<?php

namespace Database\Factories;

use App\Models\Examination;
use App\Models\QuestionGroup;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;
use Ramsey\Uuid\Type\Integer;

/**
 * @extends Factory<QuestionGroup>
 */
class QuestionGroupFactory extends Factory
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
            'priority' => random_int(1,100),
            'examination_id' => Examination::get()->random()
        ];
    }
}
