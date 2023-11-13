<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAnswers;
use App\Http\Services\LessonService;
use App\Http\Services\QuestionGroupService;
use App\Http\Services\UserAnswerService;
use App\Http\Services\UserTakenCourseService;
use App\Http\Services\UserTakenExaminationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserAnswerController extends Controller
{
    /**
     * @param UserTakenCourseService $takenCourseService
     * @param QuestionGroupService $questionGroupService
     * @param UserAnswerService $userAnswerService
     * @param UserTakenExaminationService $takenExaminationService
     */
    public function __construct(
        private readonly UserTakenCourseService $takenCourseService,
        private readonly QuestionGroupService $questionGroupService,
        private readonly UserAnswerService $userAnswerService,
        private readonly UserTakenExaminationService $takenExaminationService
    )
    {
    }

    /**
     * @param StoreUserAnswers $request
     * @return RedirectResponse
     */
    public function store(StoreUserAnswers $request): RedirectResponse
    {
        $data = $request->validated();

        $this->userAnswerService->storeUserAnswers($data);
        $questionGroup = $this->questionGroupService->findFirstById($request->question_group);

        $takenCourse = $this->takenCourseService->findByCourseIdAndUserId($questionGroup->examination->lesson->course_id, Auth::id());
        $takenExamination = $this->takenExaminationService->findByUserIdAndExaminationId(Auth::id(),$questionGroup->examination->id);

        $questionGroups = $this->questionGroupService->getQuestionGroupsWithPriorityByExamination($questionGroup->examination);

        if (!$this->questionGroupService->checkLast($questionGroups, $questionGroup->resource)) {
            $this->takenExaminationService->updateToNext($questionGroups, $takenExamination->resource);

            return redirect()->route('examinations.show',$questionGroup->examination_id);
        }
        if ($this->userAnswerService->checkUserPassedTest($questionGroup->examination)) {
            $this->takenExaminationService->setFinishedTime($takenExamination->resource);
            $this->takenCourseService->setWaitingStatus($takenCourse->resource);
            $this->takenExaminationService->setFinishStatus($this->takenExaminationService->findByUserIdAndExaminationId(Auth::id(),$questionGroup->examination->id)->resource);

        } else {
            $this->userAnswerService->deleteWrongExaminationAnswers($questionGroup->examination, Auth::id());
            $this->takenExaminationService->setLoggedStatus($takenExamination->resource);
        }
        return redirect()->route('lessons.show',$this->takenCourseService->findByCourseIdAndUserId($takenCourse->course->id, Auth::id())->lesson_id);
    }
}
