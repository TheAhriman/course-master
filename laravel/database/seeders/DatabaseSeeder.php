<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Resources\CourseResource;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Examination;
use App\Models\Lesson;
use App\Models\Permission;
use App\Models\QuestionGroup;
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
            'role_id' => Role::get()->random()->id,
            'remember_token' => Str::random(10)
            ]);
        Course::factory(1)->create();
        Lesson::factory(5)->create();
        Examination::factory(10)->create();
        QuestionGroup::factory(10)->create();
    }
}
