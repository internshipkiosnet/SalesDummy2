<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $attrs = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // $user = User::where('username', $request->username)->first();
        // dd($user);
        if (!Auth::attempt($attrs)) {
            return response([
                'message' => 'The provided credentials are incorrect'
            ],403);
        }

        // if (! $user || ! Hash::check($request->password, $user->password)) {
        //     throw ValidationException::withMessages([
        //         'email' => ['The provided credentials are incorrect.'],
        //     ]);
        // }
        // $token = $user->createToken("aaa");
        return response([
            'user' => auth()->user(),
            'token' => auth()->user()->createToken("token")->plainTextToken,
        ],200);
        // return ['token' => $token->plainTextToken],url()];
        // return $user->createToken("aaa")->plainTextToken;
    }

    public function logout(Request $request) 
    {
        $request->user()->currentAccessToken()->delete();
    }
}
