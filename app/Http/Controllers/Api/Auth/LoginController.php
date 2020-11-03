<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            "email" => "required|string",
            "password" => "required|string",
        ]);

        abort_if(!Auth::attempt($data), 401, trans("auth.failed"));

        $accessToken = Auth::user()->createToken("authToken")->accessToken;

        return response()->json([
            "user" => Auth::user(),
            "access_token" => $accessToken
        ]);
    }
}
