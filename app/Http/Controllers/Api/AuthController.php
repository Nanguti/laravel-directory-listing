<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (!Auth::guard('account')->attempt($credentials, $request->remember)) {
            return response([
                'message' => 'The provided credentials are invalid. Please try again.',
            ], 401);
        }

        $account = Auth::guard('account')->user();
        $token = $account->createToken('main')->plainTextToken;
        $account->makeHidden(['password']);
        return response()->json([
            'account' => $account,
            'token' => $token,
        ]);
    }

    public function signup(SignupRequest $request)
    {
        try {
            $data = $request->validated();

            $account = Account::create([
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
                'password' => bcrypt($data['password']),
                'address' => $data['address'] ?? null,
                'bio' => $data['bio'] ?? null,
                'profile_picture' => $data['profile_picture'] ?? null
            ]);

            $token = $account->createToken('main')->plainTextToken;
            $account->makeHidden(['password']);

            return response()->json([
                'account' => $account, 
                'token' => $token
            ]);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function logout(Request $request)
    {
        $account = $request->account();
        $account->currentAccessToken()->delete();
    }
}
