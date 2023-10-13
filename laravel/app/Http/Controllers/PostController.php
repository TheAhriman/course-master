<?php

namespace App\Http\Controllers;

use App\Actions\GetPostPublishDataAction;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Services\Interfaces\PostServiceInterface;
use Illuminate\Http\RedirectResponse;


class PostController extends Controller
{
    /**
     * PostController
     *
     * @param PostServiceInterface $postService
     * @param GetPostPublishDataAction $getPostPublishDataAction
     */
    public function __construct(private readonly PostServiceInterface $postService,
        private readonly GetPostPublishDataAction $getPostPublishDataAction)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->postService->getAll(30);

        return view('admin_panel.posts.index',compact('posts'));
    }

    public function indexTrashed()
    {
        $posts = $this->postService->getAllTrashed(30);

        return view('admin_panel.posts.index_trashed', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->getPostPublishDataAction->execute();

        return view('admin_panel.posts.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $path = $request->file('image')->store('public');
        $data['image'] = $path;

        $this->postService->create($data);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $post = $this->postService->getById($id);

        return view('admin_panel.posts.show',compact('post'));
    }

    public function showTrashed(string $id)
    {
        $post = $this->postService->getByIdTrashed($id);

        return view('admin_panel.posts.show_trashed',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->getPostPublishDataAction->execute();
        $data['post'] = $this->postService->getById($id);

        return view('admin_panel.posts.edit', compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $data = $request->validated();
        $path = $request->file('image')->store('public');
        $data['image'] = $path;
        $this->postService->updateById($id, $data);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param string $id
     * @param bool|null $permanent $
     * @return RedirectResponse
     */
    public function destroy(string $id, ?bool $permanent = null)
    {
        if (is_null($permanent)){
            $this->postService->deleteById($id);
            return redirect()->route('admin.posts.index');
        } else {
            $this->postService->permanentlyDeleteById($id);
            return redirect()->route('admin.posts.indexTrashed');
        }
    }
}
