<?php

namespace App\Http\Controllers;

use App\DTO\UpdateUserProgressDTO;
use App\Http\Services\UserProgressService;
use App\Models\UserProgress;
use Illuminate\Http\Request;

class UserProgressController extends Controller
{
    public function __construct(private readonly UserProgressService $progressService)
    {
    }

    public function index()
    {
        $data = $this->progressService->paginate();

        return view('admin_panel.user_progresses.index',compact('data'));
    }

    public function confirmLessonFinished(UserProgress $userProgress)
    {
        //TODO Сделать нормальное открытие следующего урока для ученика
        $this->progressService->updateById($userProgress->id, new UpdateUserProgressDTO($userProgress->lesson_id+1,false));

        return redirect()->route('admin.user_progresses.index');
    }
}
