<?php

namespace App\Listeners\Auth;

use App\Events\Auth\RegisterUser;
use App\Mail\UserRegistered;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendVerificationMail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RegisterUser $user): void
    {
        Mail::to($user->user->email)->send(new UserRegistered($user->user));
    }
}
