<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateRoleDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Services\RoleService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class RoleController extends Controller
{
    /**
     * @param RoleService $roleService
     */
    public function __construct(private readonly RoleService $roleService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->roleService->paginate();

        return view('admin_panel.roles.index',compact('roles'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function indexTrashed()
    {
        $roles = $this->roleService->paginateTrashed(15);

        return view('admin_panel.roles.index_trashed',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_panel.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $this->roleService->create(new CreateRoleDTO(...$request->validated()));

        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = $this->roleService->findFirstById($id);

        return view('admin_panel.roles.show', compact('role'));
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function showTrashed(string $id)
    {
        $role = $this->roleService->findFirstByIdTrashed($id);

        return view('admin_panel.roles.show_trashed',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = $this->roleService->findFirstById($id);

        return view('admin_panel.roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRoleRequest $request, string $id)
    {
        $this->roleService->updateById($id, new CreateRoleDTO(...$request->validated()));

        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->roleService->deleteById($id);

        return redirect()->route('admin.roles.index');
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function restore(string $id)
    {
        $this->roleService->restoreById($id);

        return redirect()->route('admin.roles.index');
    }
}
