<?php

    namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;

    use App\Http\Requests\auth\ForgotPasswordRequest;
    use App\Mail\auth\ResetPassword;
    use App\Models\User;

    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\Password;

    class ForgotPasswordController extends Controller
    {

        /**
         * Handle the incoming request.
         */
        public function __invoke(ForgotPasswordRequest $request)
        {
            $user = User::whereEmail($request->email)->first();
            $token = Password::getRepository()->create($user);
            $user->sendPasswordResetNotification($token);

        }
    }
