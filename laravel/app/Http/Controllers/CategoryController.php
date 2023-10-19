<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Services\CategoryService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @param CategoryService $categoryService
     */
    public function __construct(private readonly CategoryService $categoryService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = $this->categoryService->getAll(15);

        return view('admin_panel.categories.index',compact('categories'));
    }

    public function indexTrashed(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = $this->categoryService->getAllTrashed(15);

        return view('admin_panel.categories.index_trashed',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = $this->categoryService->getAll();

        return view('admin_panel.categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->categoryService->create($data);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $category = $this->categoryService->getById($id);

        return view('admin_panel.categories.show',compact('category'));
    }

    public function showTrashed(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $category = $this->categoryService->getByIdTrashed($id);

        return view('admin_panel.categories.show_trashed',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = $this->categoryService->getById($id);
        $categories = $this->categoryService->getAll();

        return view('admin_panel.categories.edit',compact(['category','categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, string $id)
    {
        $data = $request->validated();
        $this->categoryService->updateById($id, $data);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->categoryService->deleteById($id);

        return redirect()->route('admin.categories.index');
    }

    public function restore(string $id)
    {
        $this->categoryService->restoreById($id);

        return redirect()->route('admin.categories.index');
    }
}
