<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('MyAppToken')->accessToken;

            return response()->json(['token' => $token->token], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
    }
}
