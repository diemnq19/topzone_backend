<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = JWTAuth::fromUser($user);

        $response = ['message' => 'Login successful', 'user' => $user, 'token' => $token];
        if ($user->is_admin) {
            $response['is_admin'] = true;
        }

        return response()->json($response);
    } else {
        return response()->json(['message' => 'Login failed'], 401);
    }
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['message' => 'Logout successful']);
    }
    public function index()
    {
        return view('auth/register');
    }
}
