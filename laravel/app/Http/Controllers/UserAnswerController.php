<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAnswers;
use App\Http\Services\LessonService;
use App\Http\Services\QuestionGroupService;
use App\Http\Services\UserAnswerService;
use App\Http\Services\UserTakenCourseService;
use App\Http\Services\UserTakenExaminationService;
use Illuminate\Support\Facades\Auth;

class UserAnswerController extends Controller
{
    public function __construct(
        private readonly UserTakenCourseService $takenCourseService,
        private readonly QuestionGroupService $questionGroupService,
        private readonly UserAnswerService $userAnswerService,
        private readonly LessonService $lessonService,
        private readonly UserTakenExaminationService $takenExaminationService
    )
    {
    }

    public function store(StoreUserAnswers $request)
    {
        $data = $request->validated();

        $this->userAnswerService->storeUserAnswers($data);
        $question_group = $this->questionGroupService->findFirstById($request->question_group);
        $takenCourse = $this->takenCourseService->findByCourseIdAndUserId($question_group->examination->lesson->course_id, Auth::id());

        if ($this->userAnswerService->checkUserPassedTest($question_group->examination)) {
            $this->takenCourseService->updateToNext($takenCourse->resource, $this->lessonService->getLessonsFromCourseWithPriority($takenCourse->course_id));
            $this->takenExaminationService->setFinishStatus($this->takenExaminationService->findByExaminationIdAndUserId(Auth::id(),$question_group->examination->id)->resource);

        } else {
            $this->userAnswerService->deleteWrongExaminationAnswers($question_group->examination, Auth::id());
            $this->takenExaminationService->setLoggedStatus($this->takenExaminationService->findByExaminationIdAndUserId(Auth::id(),$question_group->examination->id)->resource);
        }
        return redirect()->route('lessons.show',$this->takenCourseService->findByCourseIdAndUserId($takenCourse->course->id, Auth::id())->lesson_id);
    }
}
