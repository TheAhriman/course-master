<?php

namespace App\Http\Controllers\Admin;

use App\DTO\UpdateUserProgressDTO;
use App\DTO\UserTakenExamination\CreateUserTakenExaminationDTO;
use App\Http\Controllers\Controller;
use App\Http\Services\CourseService;
use App\Http\Services\LessonService;
use App\Http\Services\UserTakenCourseService;
use App\Http\Services\UserTakenExaminationService;
use App\Models\Lesson;
use App\Models\UserProgress;
use App\Models\UserTakenCourse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class UserTakenCourseController extends Controller
{
    public function __construct(
        private readonly UserTakenCourseService $takenCourseService,
        private readonly CourseService $courseService,
        private readonly LessonService $lessonService,
        private readonly UserTakenExaminationService $takenExaminationService
    )
    {
    }

    public function index()
    {
        Auth::user()->hasRole('admin')
            ? $data = $this->takenCourseService->paginate()
            : $data = $this->takenCourseService->waiting($this->courseService->getAllByAuthor(Auth::id()))->paginate();

        return view('admin_panel.user_taken_courses.index', compact('data'));
    }

    public function confirmLesson(UserTakenCourse $userTakenCourse)
    {
        $userTakenCourse = $this->takenCourseService->findFirstById($userTakenCourse->id);
        $lesson = $this->lessonService->findFirstById($userTakenCourse->lesson_id);
        if($this->checkNextTest($lesson->resource)){
            $this->logUserOnTest($userTakenCourse->resource, $lesson->resource);

        } else
            $this->takenCourseService->updateToNext($userTakenCourse->resource, $this->lessonService->getLessonsFromCourseWithPriority($userTakenCourse   ->course_id));

        return redirect()->route('admin.user_taken_courses.index');
    }

    public function logUserOnTest(UserTakenCourse $userTakenCourse, Lesson $lesson)
    {
        $this->takenExaminationService->create(new CreateUserTakenExaminationDTO(Auth::id(),$lesson->examinations[0]->id,$lesson->examinations[0]->question_groups[0]->id));
        $this->takenCourseService->setTestingStatus($userTakenCourse);
    }

    public function checkNextTest(Lesson $lesson)
    {
        if($lesson->examinations->first() != null){
            $takenExamination = $this->takenExaminationService->findByExaminationIdAndUserId(Auth::id(), $lesson->examinations->first()->id);
            if($takenExamination->resource != null && $takenExamination->status == 'finished') return false;

            return true;
        }
        return false;
    }

}
