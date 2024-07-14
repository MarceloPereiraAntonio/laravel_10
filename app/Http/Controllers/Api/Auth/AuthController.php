<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function auth(AuthRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        $hashPassword = Hash::check($request->password, $user->password);

        if(!$user || !$hashPassword){
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are invalid !']
            ]);
        }

        $user->tokens()->delete();

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {

        $request->user()->tokens()->delete();

        return response()->json([
            'massage' => 'success'
        ]);
    }


    public function me(Request $request)
    {
        return response()->json([
            'user' => $request->user()
        ]);
    }
}
