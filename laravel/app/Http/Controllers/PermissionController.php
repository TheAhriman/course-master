<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionsRequest;
use App\Http\Services\PermissionService;
use App\Http\Services\RoleService;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct(private readonly PermissionService $permissionService, private readonly RoleService $roleService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = $this->permissionService->getAll(15);

        return view('admin_panel.permissions.index',compact('permissions'));
    }

    public function indexTrashed()
    {
        $permissions = $this->permissionService->getAllTrashed(15);

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
        $data = $request->validated();
        $this->permissionService->create($data);

        return redirect()->route('admin.permissions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permission = $this->permissionService->getById($id);

        return view('admin_panel.permissions.show',compact('permission'));
    }

    public function showTrashed(string $id)
    {
        $permission = $this->permissionService->getByIdTrashed($id);

        return view('admin_panel.permissions.show_trashed',compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = $this->roleService->getAll();
        $permission = $this->permissionService->getById($id);

        return view('admin_panel.permissions.edit',compact(['permission','roles']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePermissionsRequest $request, string $id)
    {
        $data = $request->validated();
        $this->permissionService->updateById($id, $data);

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

    public function restore(string $id)
    {
        $this->permissionService->restoreById($id);

        return redirect()->route('admin.permissions.index');
    }
}
