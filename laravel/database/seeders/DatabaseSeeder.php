<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Resources\CourseResource;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory(10)->create();
        Permission::factory(10)->create();
        $categories = Category::factory(10)->create();
        User::factory(100)->create();
        $courses = Course::factory(10)->create();

        foreach ($courses as $course){
            $categoriesIds = $categories->random(2)->pluck('id');
            $course->categories()->attach($categoriesIds);
        }
    }
}
