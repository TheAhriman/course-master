<?php

namespace App\Policies;

use App\Http\Services\UserProgressService;
use App\Models\Lesson;
use App\Models\User;
use App\Models\UserProgress;

class LessonPolicy
{
    public function show(User $user, Lesson $lesson): bool
    {
        if ($user->hasRole('admin')) return true;

        $userProgress = UserProgress::query()->where('user_id','=',$user->id)->where('course_id','=',$lesson->course_id)->first();

        if ($userProgress == null || $userProgress->lesson_id < $lesson->id) return false;

        return true;
    }
}
