<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Services\UserService;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private readonly UserService $userService)
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
        $roles = Role::all();

        return view('admin_panel.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $this->userService->create($data);

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
        $roles = Role::all();
        $user = $this->userService->findFirstById($id);

        return view('admin_panel.users.edit',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserRequest $request, string $id)
    {
        $data = $request->validated();
        $this->userService->updateById($id, $data);

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

    public function restore(string $id)
    {
        $this->userService->restoreById($id);

        return redirect()->route('admin.users.index');
    }
}
