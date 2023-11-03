<?php

namespace App\Http\Controllers;

use App\DTO\CreateFinishedCourseDTO;
use App\Http\Requests\StoreFinishedCourseRequest;
use App\Http\Services\FinishedCourseService;
use App\Http\Services\UserProgressService;

class FinishedCourseController extends Controller
{
    public function __construct(private readonly FinishedCourseService $finishedCourseService, private readonly UserProgressService $progressService)
    {
    }

    public function store(StoreFinishedCourseRequest $request)
    {
        $this->finishedCourseService->create(new CreateFinishedCourseDTO(...$request->validated()));
        $this->progressService->deleteById($this->progressService->firstByUserIdAndCourseId(...$request->validated())->id);

        return redirect()->route('courses.index');
    }
}
