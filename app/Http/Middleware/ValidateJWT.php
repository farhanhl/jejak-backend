<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;

class ValidateJWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization');

        if (!$token) {
            return response()->json(['error' => 'Token tidak tersedia'], 401);
        }

        try {
            JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));
        } catch (ExpiredException $e) {
            return response()->json(['error' => 'Token sudah kadaluarsa'], 401);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat memeriksa token'], 401);
        }

        return $next($request);
    }
}
