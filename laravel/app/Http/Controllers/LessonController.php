<?php

namespace App\Http\Controllers;

use App\DTO\CreateUserProgressDTO;
use App\Http\Services\LessonContentService;
use App\Http\Services\LessonService;
use App\Http\Services\UserProgressService;
use App\Models\Lesson;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
        $lesson = $this->lessonService->findFirstById($lesson->id);
        $lessonContent = $this->lessonContentService->getContentForLesson($lesson->id);

        return view('lessons.show',compact(['lesson','lessonContent']));
    }

	/**
	 * @param Lesson $lesson
	 * @return RedirectResponse
	 */
    public function setLessonFinished(Lesson $lesson): RedirectResponse
    {
        $this->progressService->create(new CreateUserProgressDTO(Auth::id(), $lesson->course->user_id, $lesson->id, true));

        return redirect()->route('lessons.show',$lesson);
    }
}
