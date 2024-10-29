<?php

namespace App\Jobs;

use App\Events\Auth\RegisterUser;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendEmailJob implements ShouldQueue
{
    use Queueable;

    private User $user;


    /**
     * Create a new job instance.
     */
    public function __construct(User $user)
    {

        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        event(new RegisterUser($this->user));
    }
}
