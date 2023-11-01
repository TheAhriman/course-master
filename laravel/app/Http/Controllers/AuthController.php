<?php

namespace App\Http\Controllers;

use App\DTO\CreateUserDTO;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Services\RoleService;
use App\Http\Services\UserService;
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
	/**
	 * @param RoleService $roleService
	 * @param UserService $userService
	 */
	public function __construct(private readonly RoleService $roleService, private readonly UserService $userService)
	{
	}

	/**
	 * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
	 */
	public function showRegisterForm(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
	{
		$roles = $this->roleService->getAll();

		return view('auth.register',compact('roles'));
	}

	/**
	 * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
	 */
	public function showLoginForm(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
	{
		return view('auth.login');
	}

	/**
	 * @param RegisterUserRequest $request
	 * @return RedirectResponse
	 */
	public function register(RegisterUserRequest $request): RedirectResponse
	{
        $user = $this->userService->create(new CreateUserDTO(...$request->validated()));

        event(new Registered($user->resource));
		Auth::login($user->resource,true);

		return redirect()->route('home');
	}

	/**
	 * @param LoginUserRequest $request
	 * @return \Illuminate\Contracts\Foundation\Application|Application|RedirectResponse|Redirector
	 */
	public function login(LoginUserRequest $request): \Illuminate\Contracts\Foundation\Application|Application|RedirectResponse|Redirector
	{
		$data = $request->validated();
		if(Auth::attempt($data))
			return redirect()->route('home');

		return redirect(route('login'))->withErrors(["email" => "Пользователь не найден"]);
	}


	/**
	 * @param Request $request
	 * @return RedirectResponse
	 */
	public function logout(Request $request): RedirectResponse
	{
		Auth::logout();

		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect()->route('home');
	}

	/**
	 * @param EmailVerificationRequest $request
	 * @return RedirectResponse
	 */
    public function verifyEmail(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();

        return redirect()->route('home');
    }

	/**
	 * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
	 */
    public function emailVerificationNotice(): \Illuminate\Contracts\Foundation\Application|Factory|View|Application
    {
        return view('auth0.verify');
    }

	/**
	 * @param Request $request
	 * @return RedirectResponse
	 */
    public function resendVerificationMail(Request $request): RedirectResponse
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
