<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function Login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|numeric|min:16',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'massage' => $validator->errors()->first(),
                'data' => null
            ], 422);
        }

        $user = User::where('nik', $request->input('nik'))->first();
        if (!$user || !Hash::check($request->input('password'), $user->password, [])) {
            return response()->json([
                'status' => 'error',
                'message' => 'NIK atau password salah.',
                'data' => null
            ], 401);
        }

        // Token
        $token = $user->createToken('token')->accessToken;
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil login.',
            'data' => [
                'user' => $user,
                'token' => $token,
            ]
        ]);
    }

    public function Logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
