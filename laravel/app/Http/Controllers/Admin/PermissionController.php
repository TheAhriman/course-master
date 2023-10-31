<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreatePermissionDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePermissionsRequest;
use App\Http\Services\PermissionService;
use App\Http\Services\RoleService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class PermissionController extends Controller
{
    /**
     * @param PermissionService $permissionService
     * @param RoleService $roleService
     */
    public function __construct(private readonly PermissionService $permissionService, private readonly RoleService $roleService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = $this->permissionService->paginate();

        return view('admin_panel.permissions.index',compact('permissions'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function indexTrashed()
    {
        $permissions = $this->permissionService->paginateTrashed();

        return view('admin_panel.permissions.index_trashed',compact('permissions'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->roleService->getAll();

        return view('admin_panel.permissions.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionsRequest $request)
    {
        $this->permissionService->create(new CreatePermissionDTO(...$request->validated()));

        return redirect()->route('admin.permissions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permission = $this->permissionService->findFirstById($id);

        return view('admin_panel.permissions.show',compact('permission'));
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function showTrashed(string $id)
    {
        $permission = $this->permissionService->findFirstByIdTrashed($id);

        return view('admin_panel.permissions.show_trashed',compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = $this->roleService->getAll();
        $permission = $this->permissionService->findFirstById($id);

        return view('admin_panel.permissions.edit',compact(['permission','roles']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePermissionsRequest $request, string $id)
    {
        $this->permissionService->updateById($id, new CreatePermissionDTO(...$request->validated()));

        return redirect()->route('admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->permissionService->deleteById($id);

        return redirect()->route('admin.permissions.index');
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function restore(string $id)
    {
        $this->permissionService->restoreById($id);

        return redirect()->route('admin.permissions.index');
    }
}
