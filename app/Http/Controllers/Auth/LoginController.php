<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Status;
use App\Enums\StatusCode;
use App\Facades\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

use App\Http\Resources\Auth\LoginResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
       $user=User::whereEmail($request->email )->first();
        if (!$user||!Hash::check($request->password,$user->password)) {
            //send error
        }
        $token=$user->createToken('bearerToken')->plainTextToken;

        return Response::success(
            trans('auth.login_success'),
            new LoginResource([
               'id'=> $user->id,
               'name'=> $user->name,
                'email'=>$user->email,
                'created_at'=>$user->created_at,
                'token'=>$token,
            ]),
            Status::SUCCESS->value,
            StatusCode::SUCCESS->value,
        );

    }
}
