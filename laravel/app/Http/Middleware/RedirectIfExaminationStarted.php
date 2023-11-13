<?php

namespace App\Http\Middleware;

use App\Enums\TakingExaminationStatusTypeEnum;
use App\Http\Services\UserTakenExaminationService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfExaminationStarted
{
    public function __construct(private readonly UserTakenExaminationService $takenExaminationService)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $takenExamination = $this->takenExaminationService->findByUserIdAndExaminationId(Auth::id(), $request->examination->id);

        if ($takenExamination->resource != null && $takenExamination->status == TakingExaminationStatusTypeEnum::IN_PROCESS)
            return redirect()->route('question_groups.show',$takenExamination->question_group_id);

        return $next($request);
    }
}
