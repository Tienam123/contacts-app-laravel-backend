<?php

namespace App\Http\Controllers\Auth;

use App\Events\Auth\RegisterUser;
use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'unique:' . User::class],
        ]);

        $user = User::new($data);
        SendEmailJob::dispatch($user);

        return response()->json([
            'user' => $user,
            'message' => 'User registered successfully. Please check your email for a verification link.'
        ], Response::HTTP_CREATED);
    }
}
