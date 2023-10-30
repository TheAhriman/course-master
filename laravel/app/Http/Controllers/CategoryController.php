<?php

namespace App\Http\Controllers;

use App\DTO\CreateCategoryDTO;
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
        $categories = $this->categoryService->paginate();

        return view('admin_panel.categories.index',compact('categories'));
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function indexTrashed(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = $this->categoryService->paginateTrashed();

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
        $this->categoryService->create(new CreateCategoryDTO(...$request->validated()));

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $category = $this->categoryService->findFirstById($id);

        return view('admin_panel.categories.show',compact('category'));
    }

    /**
     * @param string $id
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function showTrashed(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $category = $this->categoryService->findFirstByIdTrashed($id);

        return view('admin_panel.categories.show_trashed',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $category = $this->categoryService->findFirstById($id);
        $categories = $this->categoryService->getAll();

        return view('admin_panel.categories.edit',compact(['category','categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, string $id): RedirectResponse
    {
        $this->categoryService->updateById($id, new CreateCategoryDTO(...$request->validated()));

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $this->categoryService->deleteById($id);

        return redirect()->route('admin.categories.index');
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function restore(string $id): RedirectResponse
    {
        $this->categoryService->restoreById($id);

        return redirect()->route('admin.categories.index');
    }
}
