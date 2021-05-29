<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use \Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{

    /**
     * ログイン
     * 
     * @return json
     */
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = User::whereEmail($request->email)->first();
            $user->tokens()->delete();
            $token = $user->createToken("login:user{$user->id}")->plainTextToken;

            return response()->json(['token' => $token], Response::HTTP_OK);
        }
        return response()->json('User Not Found.', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * ログアウト
     * 
     * @return void
     */
    public function logout()
    {
        Auth::logout();
        return response()->json('Logout Success', Response::HTTP_OK);
    }
}
