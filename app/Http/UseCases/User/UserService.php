<?php

namespace App\Http\UseCases\User;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class UserService
{
    public function verify(User $user, string $hash): array
    {

        if ($user->hasVerifiedEmail() && !$user->verification_token) {
            throw new \Exception('Email address already verified', Response::HTTP_BAD_REQUEST);
        }

        if ($user->markEmailAsVerified()) {
            $user->verification_token = null;
            $user->save();
        }
        return ['success' => true, 'message' => 'Email address verified'];
    }
}
