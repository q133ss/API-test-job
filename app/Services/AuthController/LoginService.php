<?php
namespace App\Services\AuthController;

use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginService{
    public function login($credentials)
    {
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email или пароль неверные'
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Не удалось создать токен'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'user' => Auth::user(),
            'token' => $token
        ], 200);
    }
}
