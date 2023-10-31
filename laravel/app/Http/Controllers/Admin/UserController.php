<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateUserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Services\RoleService;
use App\Http\Services\UserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * @param UserService $userService
     * @param RoleService $roleService
     */
    public function __construct(private readonly UserService $userService, private readonly RoleService $roleService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userService->paginate();

        return view('admin_panel.users.index',compact('users'));
    }

    /**
     * Display a listing of the deleted resource.
     */
    public function indexTrashed()
    {
        $users = $this->userService->paginateTrashed();

        return view('admin_panel.users.index_trashed',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->roleService->getAll();

        return view('admin_panel.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $this->userService->create(new CreateUserDTO(...$request->validated()));

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->userService->findFirstById($id);

        return view('admin_panel.users.show',compact('user'));
    }

    /**
     * @param string $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function showTrashed(string $id)
    {
        $user = $this->userService->findFirstByIdTrashed($id);

        return view('admin_panel.users.show_trashed',compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $roles = $this->roleService->getAll();
        $user = $this->userService->findFirstById($id);

        return view('admin_panel.users.edit',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, string $id)
    {
        $this->userService->updateById($id, new CreateUserDTO(...$request->validated()));

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userService->deleteById($id);

        return redirect()->route('admin.users.index');
    }

    /**
     * @param string $id
     * @return RedirectResponse
     */
    public function restore(string $id)
    {
        $this->userService->restoreById($id);

        return redirect()->route('admin.users.index');
    }
}
