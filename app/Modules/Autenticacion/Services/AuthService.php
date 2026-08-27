<?php

namespace App\Modules\Autenticacion\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function login(array $credentials, bool $remember = false): void
    {
        if (! Auth::attempt($credentials, $remember)) {

            throw ValidationException::withMessages([
                'email' => 'Las credenciales ingresadas son incorrectas.',
            ]);
        }

        request()->session()->regenerate();
    }

    public function logout(): void
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();
    }
}