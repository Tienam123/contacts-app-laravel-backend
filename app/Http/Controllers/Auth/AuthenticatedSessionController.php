<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $user = User::where('email', '=', $request->email)->first();

        if (is_null($user)) {
            return response()->json(['status' => 404, 'message' => 'User Not Found'], 404);
        }

        $user->tokens()->delete();
        $token = $user->createToken('auth_token');

        return response()->json([
            'status' => true,
            'message' => 'Login Successful',
            'name' => auth()->user(),
            'token' => $token->plainTextToken,
        ]);


    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response
    {
       $user = auth()->user();
//        $request->session()->invalidate();
//        $request->session()->regenerateToken();

        return response()->json($user);
    }
}
