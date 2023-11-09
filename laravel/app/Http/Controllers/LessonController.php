<?php

namespace App\Http\Controllers;

use App\DTO\UserTakenExamination\CreateUserTakenExaminationDTO;
use App\Http\Services\LessonContentService;
use App\Http\Services\LessonService;
use App\Http\Services\UserTakenCourseService;
use App\Http\Services\UserTakenExaminationService;
use App\Models\Lesson;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    /**
     * @param LessonService $lessonService
     * @param LessonContentService $lessonContentService
     * @param UserTakenCourseService $takenCourseService
     */
    public function __construct(private readonly LessonService $lessonService,
        private readonly LessonContentService $lessonContentService,
        private readonly UserTakenCourseService $takenCourseService,
        private readonly UserTakenExaminationService $takenExaminationService
    )
    {
    }

	/**
	 * @param Lesson $lesson
	 * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
	 */
    public function show(Lesson $lesson): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        $this->authorize('show', $lesson);
		$data = [];
		if (Auth::user()->cannot('firstLesson', $lesson))
			$data['previousLesson'] = $this->lessonService->findPrevious($lesson);
		if (Auth::user()->can('viewNextLesson',$lesson))
			$data['nextLesson'] = $this->lessonService->findNext($lesson);

        $lesson = $this->lessonService->findFirstById($lesson->id);
        $lessonContent = $this->lessonContentService->getContentForLesson($lesson->id);

        return view('lessons.show',compact(['lesson','lessonContent','data']));
    }

	/**
	 * @param Lesson $lesson
	 * @return RedirectResponse
	 */
    public function setLessonFinished(Lesson $lesson): RedirectResponse
    {
        if($this->checkExaminationsInLesson($lesson)){
            $this->takenExaminationService->create(new CreateUserTakenExaminationDTO(Auth::id(),$lesson->examinations[0]->id,$lesson->examinations[0]->question_groups[0]->id));
            $this->takenCourseService->setTestingStatus($this->takenCourseService->findByCourseIdAndUserId($lesson->course_id, Auth::id())->resource);
        } else {
            $this->takenCourseService->setWaitingStatus(
                takenCourse: $this->takenCourseService->findByCourseIdAndUserId($lesson->course_id, Auth::id())->resource);
        }
        return redirect()->route('lessons.show',$lesson);
    }

    public function checkExaminationsInLesson(Lesson $lesson)
    {
        return $lesson->examinations[0] != null;
    }

    public function finishCourse(Lesson $lesson)
    {
        $this->takenCourseService->setCourseFinished(
            takenCourse: $this->takenCourseService->findByCourseIdAndUserId($lesson->course_id, Auth::id())->resource);

        return redirect()->route('courses.index');
    }
}
