<?php
namespace App\Services\AuthController;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterService{
    public function register(Request $request)
    {
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->save();

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'success' => true,
            'user' => $user,
            'token' => $token
        ], 201);
    }
}
