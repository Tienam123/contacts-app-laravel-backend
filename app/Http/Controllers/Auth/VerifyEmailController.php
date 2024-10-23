<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\UseCases\User\UserService;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VerifyEmailController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(Request $request, $id, $hash): JsonResponse
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json('User not found', 404);
        }

        try {
            $message = $this->userService->verify($user, $hash);
            return response()->json($message, Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([['success' => false, 'message' => $exception->getMessage(),'code' => $exception->getCode()]], $exception->getCode());
        }


    }
}
