<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory(5)->create();
        Permission::factory(10)->create();
        User::factory(1000)->create();
        Category::factory(10)->create();
        $posts = Post::factory(100)->create();
        Comment::factory(500)->create();
        $tags = Tag::factory(20)->create();

        foreach ($posts as $post)
        {
            $tagsIds = $tags->random(2)->pluck('id');
            $post->tags()->attach($tagsIds);
        }
    }
}
