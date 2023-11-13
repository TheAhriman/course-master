<?php

namespace App\Http\Controllers;

use App\Http\Services\ExaminationService;
use App\Http\Services\UserTakenExaminationService;
use App\Models\Examination;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExaminationController extends Controller
{
    /**
     * @param ExaminationService $examinationService
     * @param UserTakenExaminationService $takenExaminationService
     */
    public function __construct(
        private readonly ExaminationService $examinationService,
        private readonly UserTakenExaminationService $takenExaminationService
    )
    {
    }

    /**
     * @param Examination $examination
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function show(Examination $examination): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        $examination = $this->examinationService->findFirstById($examination->id);
        $takenExamination = $this->takenExaminationService->findByUserIdAndExaminationId(Auth::id(), $examination->id);

        return view('examinations.show',compact(['examination','takenExamination']));
    }

    /**
     * @param Examination $examination
     * @return RedirectResponse
     */
    public function startTest(Examination $examination): RedirectResponse
    {
        $takenExamination = $this->takenExaminationService->findByUserIdAndExaminationId(Auth::id(), $examination->id);
        $this->takenExaminationService->setInProcessStatus($takenExamination->resource);
        $this->takenExaminationService->setStartedTime($takenExamination->resource);

        return redirect()->route('question_groups.show',$takenExamination->question_group_id);
    }
}
