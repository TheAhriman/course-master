<?php

namespace App\Policies;

use App\Http\Services\UserTakenCourseService;
use App\Models\Course;
use App\Models\User;
use function PHPUnit\Framework\isTrue;

class CoursePolicy
{
    public function __construct(private readonly UserTakenCourseService $takenCourseService)
    {
    }

    public function before(User $user): bool|null
    {
        return $user->role->name == 'admin'
            ? true : null;
    }

    public function requested(User $user, Course $course): bool
    {
        $takenCourse = $this->takenCourseService->findByCourseIdAndUserId($course->id, $user->id);

        if ($takenCourse->resource == null || $takenCourse->status != 'requested')
            return false;

        return true;
    }

    public function isAuthor(User $user, Course $course): bool
    {
        return $user->id == $course->user_id;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->role->name == 'admin';
    }


    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role->name == 'creator';
    }
}