<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(Request $request, $id, $hash)
    {
        //TODO: Complete Bussiness Logic to Verification E-mail user
        return [
            'id' => $id,
            'hash' => $hash,
            'message' => 'Your account has been verified.',
        ];
//        if ($request->user()->hasVerifiedEmail()) {
////            return redirect()->intended(
////                config('app.frontend_url').'/dashboard?verified=1'
////            );
//        }
//
//        if ($request->user()->markEmailAsVerified()) {
//            event(new Verified($request->user()));
//        }
//
//        return redirect()->intended(
////            config('app.frontend_url').'/dashboard?verified=1'
//        );
    }
}
