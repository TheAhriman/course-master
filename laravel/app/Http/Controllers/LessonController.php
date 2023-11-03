<?php

namespace App\Http\Controllers;

use App\DTO\CreateUserProgressDTO;
use App\DTO\SetFinishedUserProgressDTO;
use App\DTO\UpdateUserProgressDTO;
use App\Http\Services\LessonContentService;
use App\Http\Services\LessonService;
use App\Http\Services\UserProgressService;
use App\Models\Lesson;
use Dflydev\DotAccessData\Data;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
	/**
	 * @param LessonService $lessonService
	 * @param UserProgressService $progressService
	 * @param LessonContentService $lessonContentService
	 */
    public function __construct(private readonly LessonService $lessonService,
        private readonly UserProgressService $progressService,
        private readonly LessonContentService $lessonContentService
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
        $userProgress = $this->progressService->firstByUserIdAndCourseId(Auth::id(), $lesson->course_id);
        $this->progressService->updateById($userProgress->id, new SetFinishedUserProgressDTO(1));

        return redirect()->route('lessons.show',$lesson);
    }

    
}
