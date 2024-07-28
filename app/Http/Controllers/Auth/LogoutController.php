<?php

    namespace App\Http\Controllers\Auth;

    use App\Enums\Status;
    use App\Enums\StatusCode;
    use App\Facades\Response;
    use App\Http\Controllers\Controller;
    use App\Http\Resources\Auth\LogoutResource;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class LogoutController extends Controller
    {
        /**
         * Handle the incoming request.
         */
        public function __invoke(Request $request)
        {
            $user = Auth::user();
            Auth::user()->currentAccessToken()->delete();
            return Response::success(
                trans('auth.logout_success'),
                new LogoutResource([
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ]),
                Status::SUCCESS->name,
                StatusCode::SUCCESS->value,
            );
        }
    }
