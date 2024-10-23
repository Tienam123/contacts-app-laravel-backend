<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user= auth()->user();
        if ($user->hasVerifiedEmail() && $user->verification_token) {
           return response()->json(['status'=>false,'user'=>$user,'message' => 'You must be verified','code' => Response::HTTP_UNAUTHORIZED], Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
