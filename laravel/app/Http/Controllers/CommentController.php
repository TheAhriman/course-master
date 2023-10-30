<?php

namespace App\Http\Controllers;

use App\DTO\CreateCommentDTO;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Services\CommentService;
use App\Http\Services\LessonService;
use App\Http\Services\UserService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(private CommentService $commentService,
        private UserService $userService,
        private LessonService $lessonService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = $this->commentService->paginate();

        return view('admin_panel.comments.index',compact('comments'));
    }

    public function indexTrashed()
    {
        $comments = $this->commentService->paginateTrashed();

        return view('admin_panel.comments.index_trashed',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lessons = $this->lessonService->getAll();
        $users = $this->userService->getAll();

        return view('admin_panel.comments.create',compact(['lessons','users']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $this->commentService->create(new CreateCommentDTO(...$request->validated()));

        return redirect()->route('admin.comments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = $this->commentService->findFirstById($id);

        return view('admin_panel.comments.show',compact('comment'));
    }

    public function showTrashed(string $id)
    {
        $comment = $this->commentService->findFirstByIdTrashed($id);

        return view('admin_panel.comments.show_trashed',compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lessons = $this->lessonService->getAll();
        $users = $this->userService->getAll();
        $comment = $this->commentService->findFirstById($id);

        return view('admin_panel.comments.edit',compact(['lessons','users','comment']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCommentRequest $request, string $id)
    {
        $this->commentService->updateById($id, new CreateCommentDTO(...$request->validated()));

        return redirect()->route('admin.comments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->commentService->deleteById($id);

        return redirect()->route('admin.comments.index');
    }

    public function restore(string $id)
    {
        $this->commentService->restoreById($id);

        return redirect()->route('admin.comments.index');
    }
}
