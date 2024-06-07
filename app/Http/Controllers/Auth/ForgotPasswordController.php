<?php

    namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;

    use App\Http\Requests\auth\ResetPasswordRequest;
    use App\Mail\auth\ResetPassword;
    use App\Models\User;

    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\Password;

    class ForgotPasswordController extends Controller
    {

        /**
         * Handle the incoming request.
         */
        public function __invoke(ResetPasswordRequest $request)
        {
            $user = User::whereEmail($request->email)->first();
            $token = Password::getRepository()->create($user);

            $result= Mail::to($user->email)->send(new ResetPassword($token));
            dd($result);

        }
    }
