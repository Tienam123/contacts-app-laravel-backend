<?php

namespace App\Http\Middleware;

use Closure;
use HttpResponse;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()->email !== 'dr.tienam123@gmail.com') {
            return response()->json([
                'message' => 'You are not authorized to access this page.',
            ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
