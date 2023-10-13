<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\StoreAndUpdateRequest;
use App\Http\Services\CategoryService;
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
    public function index()
    {
        $categories = $this->categoryService->getAll(30);

        return view('admin_panel.categories.index', compact('categories'));
    }

    public function indexTrashed()
    {
        $categories = $this->categoryService->getAllTrashed(30);

        return view('admin_panel.categories.index_trashed', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryService->getAll();

        return view('admin_panel.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAndUpdateRequest $request)
    {
        $data = $request->validated();

        $this->categoryService->create($data);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = $this->categoryService->getById($id);
        $parent = $category->parent;
        $children = $category->children;
        $data = [
            'category' => $category,
            'parent' => $parent,
            'children' => $children
        ];

        return view('admin_panel.categories.show', compact('data'));
    }

    public function showTrashed(string $id)
    {
        $category = $this->categoryService->getByIdTrashed($id);
        $parent = $category->parent;
        $children = $category->children;
        $data = [
            'category' => $category,
            'parent' => $parent,
            'children' => $children
        ];

        return view('admin_panel.categories.show_trashed', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = $this->categoryService->getById($id);
        $categories = $this->categoryService->getAll();
        $categories->pull($category->id);

        return view('admin_panel.categories.edit', compact(['category','categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAndUpdateRequest $request, string $id)
    {
        $data = $request->validated();
        $this->categoryService->updateById($id, $data);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, ?bool $permanent = null)
    {
        if (is_null($permanent)){
            $this->categoryService->deleteById($id);
            return redirect()->route('admin.categories.index');
        } else {
            $this->categoryService->permanentlyDeleteById($id);
            return redirect()->route('admin.categories.indexTrashed');
        }
    }
}
