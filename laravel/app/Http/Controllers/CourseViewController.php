<?php

namespace App\Http\Controllers;

use App\DTO\CreateUserProgressDTO;
use App\Http\Services\AboutCourseService;
use App\Http\Services\LessonService;
use App\Http\Services\UserProgressService;
use App\Models\Lesson;
use App\Repositories\UserProgressRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseViewController extends Controller
{
    public function __construct(private readonly LessonService $lessonService, private readonly UserProgressService $progressService)
    {
    }
    public function show(Lesson $lesson)
    {
        $this->authorize('show',$lesson);
        $lesson = $this->lessonService->findFirstById($lesson->id);

        return view('courses.about',compact('lesson'));
    }

    public function setLessonFinished(Lesson $lesson)
    {
        $this->progressService->create(new CreateUserProgressDTO(Auth::id(), $lesson->course_id, $lesson->id, true));

        return redirect()->route('lessons.show',$lesson);
    }
}
