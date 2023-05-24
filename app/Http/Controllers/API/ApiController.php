<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function Login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required',
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
        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'NIK atau password salah.',
                'data' => null
            ], 401);
        }

        // Token
        $token = $user->createToken('token')->plainTextToken;
        $user->token = $token;
        $response = [
            'status' => 'success',
            'message' => 'Berhasil login.',
            'data' => $user
        ];
        return $response = response()->json($response, 200);
    }

    public function profile(Request $request)
    {
        $user = $request->user();
        return response()->json([
            'user' => $user
        ]);
    }

    public function editprofile(Request $request)
    {
        $data = $request->all();
        $user = User::find(Auth::user()->id);
        $user->update($data);
        return response()->json([
            'message' => 'update success',
            'data' => $user
        ]);
    }

    public function editpassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8',
            'newpass' => 'required|min:8'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'massage' => $validator->errors()->first(),
                'data' => null
            ], 422);
        }
        $pass = $request->input('password');
        $newpass = $request->input('newpass');
        $confirmpass = $request->input('confirmpass');
        $user = User::find(Auth::user()->id);
        if (!Hash::check($pass, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'your password is incorrect',
                'data' => null
            ], 401);
        } elseif ($newpass != $confirmpass) {
            return response()->json([
                'status' => 'error',
                'message' => 'Your password not same',
                'data' => null
            ], 401);
        }
        $user->update(['password' => Hash::make($newpass)]);
        return response()->json([
            'message' => 'success',
            'data' => $user
        ]);
    }

    public function updatefoto(Request $request)
    {
        $image = $request->file('foto');
        $maxSize = 1024;
        $user = User::find(Auth::user()->id);
        if (!isset($image)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Masukkan gambar'
            ]);
        }
        if ($image->isValid()) {
            if (!in_array($image->getClientOriginalExtension(), ['png', 'jpg', 'jpeg'])) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'The uploaded file is not a valid PNG, JPEG, or JPG image.'
                ], 400);
            } elseif ($image->getSize() > $maxSize * 1024) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'The uploaded file exceeds the maximum size limit of 2 MB'
                ], 400);
            }
            // Hapus foto lama, jika ada
            if ($user->foto && Storage::exists($user->foto)) {
                Storage::delete($user->foto);
            }

            // Simpan foto baru
            $path = $image->store('Pegawai/foto');
            $user->foto = $path;
            $user->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Foto profil berhasil diupdate.'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'gambar tidak sesuai'
            ]);
        }
    }

    public function deletefoto()
    {
        $image = Auth::user()->foto;
        Storage::delete($image);
        $user = User::find(Auth::user()->id);
        $user->foto = '';
        $user->save();
        return response()->json([
            'status' => 'success',
            'message' => 'success'
        ], 200);
    }

    public function Logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
