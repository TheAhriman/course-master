<?php

namespace App\Http\Controllers\Admin;

use App\DTO\UserTakenExamination\CreateUserTakenExaminationDTO;
use App\Enums\TakingExaminationStatusTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Services\CourseService;
use App\Http\Services\LessonService;
use App\Http\Services\QuestionGroupService;
use App\Http\Services\QuestionService;
use App\Http\Services\UserLessonService;
use App\Http\Services\UserTakenCourseService;
use App\Http\Services\UserTakenExaminationService;
use App\Models\Lesson;
use App\Models\UserTakenCourse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class UserTakenCourseController extends Controller
{
    public function __construct(
        private readonly UserTakenCourseService $takenCourseService,
        private readonly CourseService $courseService,
        private readonly LessonService $lessonService,
        private readonly UserTakenExaminationService $takenExaminationService,
        private readonly UserLessonService $userLessonService,
        private readonly QuestionGroupService $questionGroupService,
        private readonly QuestionService $questionService
    )
    {
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function index(): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        Auth::user()->role->name == 'admin'
            ? $data = $this->takenCourseService->getAll()
            : $data = $this->takenCourseService->findWaitingConfirm($this->courseService->getAllByAuthor(Auth::id()));

        $data = $this->userLessonService->addCompletionTime($data);
        $data = $this->takenExaminationService->addCompletionTime($data);
        $data = $data->paginate();

        return view('admin_panel.user_taken_courses.index', compact('data'));
    }

    /**
     * @param UserTakenCourse $userTakenCourse
     * @return RedirectResponse
     */
    public function logUserInCourse(UserTakenCourse $userTakenCourse): RedirectResponse
    {
        $this->takenCourseService->setOnCourseStatus($this->takenCourseService->findFirstById($userTakenCourse->id)->resource);

        return redirect()->route('admin.user_taken_courses.index');
    }

    /**
     * @param UserTakenCourse $userTakenCourse
     * @return RedirectResponse
     */
    public function confirmLesson(UserTakenCourse $userTakenCourse): RedirectResponse
    {
        $userTakenCourse = $this->takenCourseService->findFirstById($userTakenCourse->id);
        $lesson = $this->lessonService->findFirstById($userTakenCourse->lesson_id);

        $this->checkNextTest($lesson->resource)
            ? $this->logUserOnTest($userTakenCourse->resource)
            : $this->takenCourseService->updateToNext($userTakenCourse->resource, $this->lessonService->getLessonsFromCourseWithPriority($userTakenCourse->course_id));

        return redirect()->route('admin.user_taken_courses.index');
    }

    public function finishCourse(UserTakenCourse $userTakenCourse)
    {
        $this->takenCourseService->setFinishStatus($userTakenCourse);

        return back();
    }

    /**
     * @param UserTakenCourse $userTakenCourse
     * @return RedirectResponse
     */
    public function logUserOnTest(UserTakenCourse $userTakenCourse)
    {
        $lesson = $this->lessonService->findFirstById($userTakenCourse->lesson_id);
        $questionGroup = $this->questionGroupService->findFirstById($lesson->examinations->first()->question_groups->first()->id);
        $questions = $this->questionService->getRandomQuestionsKeysByQuestionGroupId($questionGroup->id, $questionGroup->questions_number);

        $this->takenExaminationService->createAndAttachQuestions(
            new CreateUserTakenExaminationDTO(
                Auth::id(),
                $lesson->examinations->first()->id,
                $questionGroup->id
            ),
            $questions
        );
        $this->takenCourseService->setTestingStatus($userTakenCourse);

        return redirect()->route('admin.user_taken_courses.index');
    }

    /**
     * @param Lesson $lesson
     * @return bool
     */
    public function checkNextTest(Lesson $lesson): bool
    {
        if($lesson->examinations->first() != null){
            $takenExamination = $this->takenExaminationService->findByUserIdAndExaminationId(
                Auth::id(),
                $lesson->examinations->first()->id
            );

            if($takenExamination->resource != null && $takenExamination->status == TakingExaminationStatusTypeEnum::FINISHED) return false;

            return true;
        }
        return false;
    }

}
