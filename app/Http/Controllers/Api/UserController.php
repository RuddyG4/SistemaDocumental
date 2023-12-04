<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:60'],
            'password' => ['required', 'max:60'],
        ]);

        if (Auth::attempt($credentials)) {
            $token = Auth::user()->createToken('auth_token')->plainTextToken;
            $user = Auth::user();
            $user->role;
            return response()->json(['token' => $token, 'user' => $user]);
        }

        return response()->json("Usuario y/o contraseña incorrectos", 401);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json('Sesión Cerrada', 200);
    }
}
