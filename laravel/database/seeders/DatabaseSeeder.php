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
        Role::query()->create(['name'=>"creator","guard_name"=>"web"]);
        Role::query()->create(['name'=>"reader","guard_name"=>"web"]);
        Role::query()->create(['name'=>"admin","guard_name"=>"web"]);

        Category::factory(10)->create();
        User::factory(100)->create();

    }
}
