<?php

namespace App\Http\Controllers;

use App\Http\Services\ExaminationService;
use App\Http\Services\UserTakenExaminationService;
use App\Models\Examination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExaminationController extends Controller
{
    public function __construct(
        private readonly ExaminationService $examinationService,
        private readonly UserTakenExaminationService $takenExaminationService
    )
    {
    }

    public function show(Examination $examination)
    {
        $examination = $this->examinationService->findFirstById($examination->id);
        $takenExamination = $this->takenExaminationService->findByExaminationIdAndUserId(Auth::id(), $examination->id);

        return view('examinations.show',compact(['examination','takenExamination']));
    }

    public function startTest(Examination $examination)
    {
        $takenExamination = $this->takenExaminationService->findByExaminationIdAndUserId(Auth::id(), $examination->id);
        $this->takenExaminationService->setInProcessStatus($takenExamination->resource);

        return redirect()->route('question_groups.show',$takenExamination->question_group_id);
    }
}
