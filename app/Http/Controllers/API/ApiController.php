<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Doctrine\Inflector\Rules\Turkish\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
                'token' => $token
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

    // public function Register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|unique:users',
    //         'nik' => 'required|numeric|digits_between:16,16|unique:users',
    //         'password' => 'required|confirmed|min:8',
    //         'passwordConfirmation' => 'required|min:8|same:password'
    //     ], [
    //         'nik.digits_between' => 'The nik field must be exactly 16 digits.'
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     $user = new User;
    //     $user->email = $request->email;
    //     $user->nik = $request->nik;
    //     $user->password = Hash::make($request->password);
    //     $user->role = 'Pegawai';
    //     $user->jumlah_cuti = 0;
    //     $user->save();

    //     $token = $user->createToken('token')->accessToken;

    //     return response()->json([
    //         'token' => $token,
    //         'message' => 'Registration successful'
    //     ], 201);
    // }
}
