<?php

namespace App\Http\Controllers;
use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::authenticate($username, $password);

        if (!$user) {
            return response()->json([
                'message' => 'Username atau password salah',
            ], 401);
        } else if ($user) {
            $token = $this->generateJWT($user);

            return response()->json([
                'message' => 'Login berhasil',
                'user' => $user,
                'token' => $token,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Terjadi kesalahan pada sistem',
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        $token = $request->token;

        if (!$token) {
            return response()->json([
                'message' => 'Token tidak ditemukan',
            ], 400);
        }

        try {
            return response()->json([
                'message' => 'Anda telah keluar dari dashboard-jejak',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan saat logout',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getUserById($id)
    {
        try {
            $user = User::findOrFail($id);
            return response()->json([
                'status' => 'success',
                'data' => $user
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'User tidak ditemukan'
            ], 404);
        }
    }

    private function generateJWT($user)
    {
        $payload = [
            'iss' => "lumen-jwt",
            'sub' => $user->username,
            'iat' => time(),
            'exp' => time() + 60 * 60
        ];

        return JWT::encode($payload, env('JWT_SECRET'), 'HS256');
    }
}