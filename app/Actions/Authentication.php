<?php

namespace App\Actions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Lorisleiva\Actions\Concerns\AsAction;

class Authentication
{
    use AsAction;

    public function handle(string $email, string $password)
    {
        if (!Auth::attempt(['email' => $email, 'password' => $password])) {
            throw new AuthenticationException('Não autenticado');
        }
        $token = Auth::user()->createToken('app');
        return ['token' => $token->plainTextToken];
    }
}
