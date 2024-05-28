<?php

	namespace App\Exceptions\Auth;

	use App\Facades\Response;
    use App\Http\Requests\Auth\LoginRequest;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use PHPUnit\Logging\Exception;
    use Illuminate\Foundation\Configuration\Exceptions;


    class AuthException
	{
        public static function checkCredentials(User $user,LoginRequest $request): void
        {
            if (!Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {

                throw new Exception('Login invalid,Password or Email incorrect');
            }
        }

        public static function exception(Exceptions $exceptions): void
        {

            $exceptions->render(function (Exception $e, Request $request){
                if ($request->is('api/*')) {

                    return  Response::error(
                        $e->getMessage(),
                        [],
                        \App\Enums\Status::ERROR->value,
                        \App\Enums\StatusCode::BAD_REQUEST->value,
                    );
                }
            });
        }
	}
