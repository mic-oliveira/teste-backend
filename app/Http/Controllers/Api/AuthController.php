<?php

namespace App\Http\Controllers\Api;

use App\Actions\Authentication;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticationRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function authenticate(AuthenticationRequest $request)
    {
        return response()->json(Authentication::run($request->validated('email'),$request->validated('password')));
    }
}
