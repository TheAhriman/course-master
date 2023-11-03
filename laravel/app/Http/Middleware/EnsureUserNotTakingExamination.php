<?php

namespace App\Http\Middleware;

use App\Http\Services\UserExaminationsProgressService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserNotTakingExamination
{
    public function __construct(private readonly UserExaminationsProgressService $progressService)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userProgress = $this->progressService->firstByUserIdAndExaminationId($request->user->id, $request->lesson->course_id);


        if ($userProgress->resource != null && $userProgress->examination_id != null)
            return redirect()->route('examinations.show',$userProgress->examination_id);

        return $next($request);
    }
}
