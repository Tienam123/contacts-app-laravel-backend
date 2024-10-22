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
        Mail::to('dr.tienam123@gmail.com')->send(new UserRegistered($user->user));
    }
}
