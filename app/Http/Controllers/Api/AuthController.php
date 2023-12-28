<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials, $request->remember)) {
            return response([
                'message' => 'The provided credentials are invalid. Please try again.',
            ], 401);
        }

        $account = Auth::account();
        $token = $account->createToken('main')->plainTextToken;

        return response()->json([
            'account' => $account,
            'token' => $token,
        ]);
    }

    public function signup(SignupRequest $request)
    {
        $data = $request->validated();
        $account = Account::create($data);
        $token = $account->createToken('main')->plainTextToken;
        return response()->json([
            'account' => $account, 
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $account = $request->account();
        $account->currentAccessToken()->delete();
    }
}
