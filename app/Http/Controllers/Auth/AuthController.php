<?php

namespace App\Http\Controllers\Auth;

use routes\bookcrossing\app\Models\User;
use routes\bookcrossing\app\Requests\LoginRequest;
use routes\bookcrossing\vendor\laravel\framework\src\Illuminate\Http\JsonResponse;
use routes\bookcrossing\vendor\laravel\framework\src\Illuminate\Support\Facades\Hash;

class AuthController
{
    public function login(LoginRequest $loginRequest): JsonResponse
    {
        dd($loginRequest);

        $user = User::where('email', $loginRequest->email)->first();

        if(!$user || !Hash::check($loginRequest->password, $user->password)){
            return response()->json([
                    'message' => 'Неверные учетные данные'
                ], 401
            );
        }
//        php artisan config:clear
//        php artisan route:clear

        $user->updateLastLogin();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
            'token_type' => 'Bearer'
        ]);
    }
}