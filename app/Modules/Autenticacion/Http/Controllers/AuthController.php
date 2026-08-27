<?php

namespace App\Modules\Autenticacion\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Autenticacion\Http\Requests\LoginRequest;
use App\Modules\Autenticacion\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $authService
    ) {}

    public function create(): Response
    {
        return Inertia::render(
            'modules/autenticacion/login'
        );
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $this->authService->login(
            $request->only('email', 'password'),
            $request->boolean('remember')
        );

        return redirect()->intended('/personas');
    }

    public function destroy(): RedirectResponse
    {
        $this->authService->logout();

        return redirect()->route('login');
    }
}