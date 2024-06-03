<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Status;
use App\Enums\StatusCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\RegisterResource;
use App\Mail\auth\UserCreated;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use App\Utils\Response\Response;
use App\Facades\Response;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request)
    {
        $user=User::create($request->toArray());

        Mail::to($user->email)->send(new UserCreated());

        return Response::success(
            trans('auth.register_success'),
            new RegisterResource($user),
            Status::SUCCESS->value,
            StatusCode::CREATED->value,
        );
    }
}
