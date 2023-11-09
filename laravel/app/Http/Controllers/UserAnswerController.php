<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAnswers;
use App\Http\Services\QuestionGroupService;
use App\Http\Services\UserTakenCourseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAnswerController extends Controller
{
    public function __construct(
        private readonly UserTakenCourseService $takenCourseService,
        private  readonly QuestionGroupService $questionGroupService
    )
    {
    }

    public function store(StoreUserAnswers $request)
    {
        $question_group = $this->questionGroupService->findFirstById($request->question_group);
        $takenCourse = $this->takenCourseService->findByCourseIdAndUserId($question_group->examination->lesson->course_id, Auth::id());
        $this->takenCourseService->setWaitingStatus($takenCourse->resource);

        return redirect()->route('lessons.show',$takenCourse->lesson_id);
    }
}
