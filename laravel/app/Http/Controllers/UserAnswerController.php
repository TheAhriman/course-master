<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAnswers;
use App\Http\Services\LessonService;
use App\Http\Services\QuestionGroupService;
use App\Http\Services\QuestionService;
use App\Http\Services\UserAnswerService;
use App\Http\Services\UserTakenCourseService;
use App\Http\Services\UserTakenExaminationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class UserAnswerController extends Controller
{
    /**
     * @param UserTakenCourseService $takenCourseService
     * @param QuestionGroupService $questionGroupService
     * @param UserAnswerService $userAnswerService
     * @param UserTakenExaminationService $takenExaminationService
     * @param QuestionService $questionService
     */
    public function __construct(
        private readonly UserTakenCourseService $takenCourseService,
        private readonly QuestionGroupService $questionGroupService,
        private readonly UserAnswerService $userAnswerService,
        private readonly UserTakenExaminationService $takenExaminationService,
        private readonly QuestionService $questionService
    )
    {
    }

    /**
     * @param StoreUserAnswers $request
     * @return RedirectResponse
     */
    public function store(StoreUserAnswers $request)
    {
        $data = $request->validated();

        $this->userAnswerService->storeUserAnswers($data);

        $questionGroup = $this->questionGroupService->findFirstById($data['question_group']);
        $questionGroups = $this->questionGroupService->getQuestionGroupsWithPriorityByExamination($questionGroup->examination);
        $takenExamination = $this->takenExaminationService->findByUserIdAndExaminationId(Auth::id(),$questionGroup->examination->id);

        if (!$this->questionGroupService->isLastQuestionGroup($questionGroups, $questionGroup->resource)) {
            $this->toNextQuestionGroup($questionGroups, $takenExamination, $questionGroup);

            return redirect()->route('examinations.show',$takenExamination->examination_id);
        } else {
            $takenCourse = $this->takenCourseService->findByCourseIdAndUserId($takenExamination->examination->lesson->course_id, Auth::id());

            if ($this->userAnswerService->checkUserPassedTest($questionGroup->examination, $takenExamination->resource)) {
                $this->finishExamination($takenExamination, $takenCourse);

                return redirect()->route('lessons.show',$takenCourse->lesson_id);
            } else {
                $this->setFailedTest($takenCourse, $takenExamination);

                return redirect()->route('home');
            }
        }
    }

    /**
     * @param Collection $questionGroups
     * @param JsonResource $takenExamination
     * @param JsonResource $questionGroup
     * @return void
     */
    public function toNextQuestionGroup(Collection $questionGroups, JsonResource $takenExamination, JsonResource $questionGroup)
    {
        $this->takenExaminationService->updateToNext($questionGroups, $takenExamination->resource);
        $takenExamination = $this->takenExaminationService->findByUserIdAndExaminationId(Auth::id(), $questionGroup->examination_id);
        $questions = $this->questionService->getRandomQuestionsKeysByQuestionGroupId($takenExamination->question_group_id, $questionGroup->questions_number);
        $this->takenExaminationService->attachQuestions($takenExamination->resource, $questions);

    }

    /**
     * @param JsonResource $takenExamination
     * @param JsonResource $takenCourse
     * @return RedirectResponse
     */
    public function finishExamination(JsonResource $takenExamination, JsonResource $takenCourse)
    {
        $this->takenExaminationService->setFinishedTime($takenExamination->resource);
        $this->takenCourseService->setWaitingStatus($takenCourse->resource);
        $this->takenExaminationService->setFinishStatus($this->takenExaminationService->findByUserIdAndExaminationId(
            Auth::id(),
            $takenExamination->examination_id
        )->resource);

        return redirect()->route('lessons.show',$takenCourse->lesson_id);
    }

    /**
     * @param JsonResource $takenCourse
     * @param JsonResource $takenExamination
     * @return void
     */
    public function setFailedTest(JsonResource $takenCourse, JsonResource $takenExamination)
    {
        $this->takenExaminationService->setFailedStatus($takenExamination->resource);
        $this->takenCourseService->setFailedTestStatus($takenCourse->resource);
    }
}
