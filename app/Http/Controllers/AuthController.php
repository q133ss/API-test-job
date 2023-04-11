<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthController\RegisterRequest;
use App\Services\AuthController\LoginService;
use App\Services\AuthController\RegisterService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        return (new RegisterService())->register($request);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        return (new LoginService())->login($credentials);
    }

}
