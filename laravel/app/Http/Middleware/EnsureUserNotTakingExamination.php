<?php

namespace App\Http\Middleware;

use App\Enums\TakingCourseStatusTypeEnum;
use App\Http\Services\UserExaminationsProgressService;
use App\Http\Services\UserTakenCourseService;
use App\Http\Services\UserTakenExaminationService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserNotTakingExamination
{
    public function __construct(private readonly UserTakenCourseService $takenCourseService)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $takenCourse = $this->takenCourseService->findByCourseIdAndUserId($request->lesson->course_id, Auth::id());

        if ($takenCourse->resource != null && $takenCourse->status == TakingCourseStatusTypeEnum::TESTING)
            return redirect()->route('examinations.show', $takenCourse->lesson->examinations->first());

        return $next($request);
    }
}
