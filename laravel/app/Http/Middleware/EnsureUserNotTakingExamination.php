<?php

namespace App\Http\Middleware;

use App\Http\Services\UserExaminationsProgressService;
use App\Http\Services\UserTakenCourseService;
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

        if ($takenCourse->resource != null && $takenCourse->status == 'testing')
            return redirect()->route('home');

        return $next($request);
    }
}
