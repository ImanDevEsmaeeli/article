<?php

    namespace App\Http\Controllers\Auth;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Auth\ResetPasswordRequest;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Password;
    use Illuminate\Support\Str;

    class ResetPasswordController extends Controller
    {
        /**
         * Handle the incoming request.
         */
        public function __invoke(ResetPasswordRequest $request)
        {
            $status = Password::reset(
                $request->only('token', 'email', 'password', 'password_confirmation'),
                function (User $user, string $password) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->setRememberToken(Str::random(60));
                    $user->save();
                }
            );

            return $status === Password::PASSWORD_RESET ? ['ok']:['No'];
        }
    }
