<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(private readonly RoleService $roleService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->roleService->getAll(15);

        return view('admin_panel.roles.index',compact('roles'));
    }

    public function indexTrashed()
    {
        $roles = $this->roleService->getAllTrashed(15);

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
        $data = $request->validated();
        $this->roleService->create($data);

        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = $this->roleService->getById($id);

        return view('admin_panel.roles.show', compact('role'));
    }

    public function showTrashed(string $id)
    {
        $role = $this->roleService->getByIdTrashed($id);

        return view('admin_panel.roles.show_trashed',compact('role'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = $this->roleService->getById($id);

        return view('admin_panel.roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRoleRequest $request, string $id)
    {
        $data = $request->validated();
        $this->roleService->updateById($id, $data);

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

    public function restore(string $id)
    {
        $this->roleService->restoreById($id);

        return redirect()->route('admin.roles.index');
    }
}
