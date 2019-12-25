<?php


namespace App\Http\Controllers\Auth\Api;


use Illuminate\Http\Request;



class AuthController
{


    public function login(Request $request) {
        $cred = $request->only('email', 'password');
        return response()->json($cred);
        if (auth()->attempt($cred)) {

            auth()->user()->tokens()->delete();
            $token = auth()->user()->createToken('SPA');

            return response()->json([
                'access_token' => $token->accessToken,
            ]);
        }

        return response()->json(['Unauthorized.'], \Illuminate\Http\Response::HTTP_UNAUTHORIZED);
    }


    public function register()
    {

    }
}
