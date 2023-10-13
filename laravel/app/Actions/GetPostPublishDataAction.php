<?php

namespace App\Actions;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class GetPostPublishDataAction
{
    public function __construct(private readonly User $user, private readonly Category $category, private readonly Tag $tag)
    {
    }

    public function execute(): array
    {
        return [
            'users' => $this->user::get(),
            'categories' => $this->category::get(),
            'tags' => $this->tag::get()
        ];
    }
}
