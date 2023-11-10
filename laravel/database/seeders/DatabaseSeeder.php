<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\QuestionTypeEnum;
use App\Http\Resources\CourseResource;
use App\Models\AboutCourse;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Examination;
use App\Models\Lesson;
use App\Models\LessonContent;
use App\Models\Permission;
use App\Models\Question;
use App\Models\QuestionGroup;
use App\Models\QuestionResponse;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::query()->create(['name'=>"creator","guard_name"=>"web"]);
        Role::query()->create(['name'=>"reader","guard_name"=>"web"]);
        Role::query()->create(['name'=>"admin","guard_name"=>"web"]);
        Category::factory(10)->create();
        User::factory(100)->create();
        User::query()->create([
            'name' => 'ScaryColony',
            'email' => 'sitkomaksim0@gmail.com',
            'email_verified_at' => now(),
            'password' => '123',
            'role_id' => 1,
            'remember_token' => Str::random(10)
            ]);
        AboutCourse::factory(1)->create();
        Course::factory(1)->create();
        Lesson::factory(5)->create();
        Examination::query()->create(['title' => '1 урок', 'lesson_id' => 1, 'min_score' => 50]);
        Examination::query()->create(['title' => '2 урок', 'lesson_id' => 3, 'min_score' => 50]);
        QuestionGroup::query()->create(['title' => fake()->title, 'priority' => 1, 'examination_id' => 1]);
        QuestionGroup::query()->create(['title' => fake()->title, 'priority' => 1, 'examination_id' => 2]);
        QuestionGroup::query()->create(['title' => fake()->title, 'priority' => 2, 'examination_id' => 1]);
        Question::query()->create([
            'question' => 'Пидор?',
            'type' => QuestionTypeEnum::RADIO,
            'priority' => 1,
            'required' => 1,
            'question_group_id' => 1,
            'score' => 25
        ]);
        Question::query()->create([
            'question' => '2+2?',
            'type' => QuestionTypeEnum::RADIO,
            'priority' => 2,
            'required' => 1,
            'question_group_id' => 1,
            'score' => 25
        ]);
        QuestionResponse::query()->create(['answer' => 'Да', 'correct' => 1, 'enabled' => 0, 'question_id' => 1]);
        QuestionResponse::query()->create(['answer' => 'Нет', 'correct' => 0, 'enabled' => 1, 'question_id' => 1]);
        QuestionResponse::query()->create(['answer' => '5', 'correct' => 0, 'enabled' => 1, 'question_id' => 2]);
        QuestionResponse::query()->create(['answer' => '4', 'correct' => 1, 'enabled' => 0, 'question_id' => 2]);
        LessonContent::factory(10)->create();

    }
}
