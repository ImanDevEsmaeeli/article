<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Status;
use App\Enums\StatusCode;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\RegisterResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Utils\Response\Response;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request)
    {
        $user=User::create($request->toArray());

        $response=new Response();
       return $response->success(
            trans('auth.success'),
            new RegisterResource($user),
            Status::SUCCESS->value,
            StatusCode::CREATED->value,
        );
    }
}
