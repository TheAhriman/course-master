<?php

namespace App\Http\Controllers;

use App\DTO\UserTakenExamination\CreateUserTakenExaminationDTO;
use App\Http\Services\LessonContentService;
use App\Http\Services\LessonService;
use App\Http\Services\UserLessonService;
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
     * @param UserLessonService $userLessonService
     */
    public function __construct(private readonly LessonService $lessonService,
        private readonly LessonContentService $lessonContentService,
        private readonly UserTakenCourseService $takenCourseService,
        private readonly UserLessonService $userLessonService
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
        $this->userLessonService->createIfNotExist(Auth::id(), $lesson->id);
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
        $this->userLessonService->setLessonFinishTime(Auth::id(), $lesson->id);
        $this->takenCourseService->setWaitingStatus(
            takenCourse: $this->takenCourseService->findByCourseIdAndUserId($lesson->course_id, Auth::id())->resource);
        return redirect()->route('lessons.show',$lesson);
    }

    /**
     * @param Lesson $lesson
     * @return RedirectResponse
     */
    public function finishCourse(Lesson $lesson): RedirectResponse
    {
        $this->takenCourseService->setFinishRequestStatus(
            takenCourse: $this->takenCourseService->findByCourseIdAndUserId($lesson->course_id, Auth::id())->resource);

        return redirect()->route('courses.index');
    }
}
