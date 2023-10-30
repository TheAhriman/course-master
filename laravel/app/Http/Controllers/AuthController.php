<?php

namespace App\Http\Controllers;

use App\DTO\CreateUserDTO;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\StoreLessonContentRequest;
use App\Http\Services\RoleService;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function __construct(private readonly RoleService $roleService, private readonly UserService $userService)
	{
	}

	public function showRegisterForm(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
	{
		$roles = $this->roleService->getAll();

		return view('auth.register',compact('roles'));
	}

	public function showLoginForm(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
	{
		return view('auth.login');
	}

	public function register(RegisterUserRequest $request): RedirectResponse
	{
        $user = $this->userService->create(new CreateUserDTO(...$request->validated()));

        event(new Registered($user->resource));
		Auth::login($user->resource,true);

		return redirect()->route('home');
	}

	public function login(LoginUserRequest $request)
	{
		$data = $request->validated();
		if(Auth::attempt($data))
			return redirect()->route('home');

		return redirect(route('login'))->withErrors(["email" => "Пользователь не найден"]);
	}


	public function logout(Request $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
	{
		Auth::logout();

		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect()->route('home');
	}

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('home');
    }

    public function emailVerificationNotice()
    {
        return view('auth0.verify');
    }

    public function resendVerificationMail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
