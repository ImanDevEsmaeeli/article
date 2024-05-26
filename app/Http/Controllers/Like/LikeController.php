<?php

namespace App\Http\Controllers\Like;

use App\Enums\Status;
use App\Enums\StatusCode;
use App\Facades\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Like\LikeRequest;
use App\Http\Resources\Like\LikeResource;
use App\Models\Like\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $likes=Auth::user()->likes()->get();

        $arrayLikeResource=[];

        foreach ($likes as $like){
            $arrayLikeResource[] = new LikeResource($like);
        }
        return Response::success(
            trans('like.success'),
            $arrayLikeResource,
            Status::SUCCESS->value,
            StatusCode::SUCCESS->value,
        );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LikeRequest $request)
    {
       $like= Auth::user()->likes()->create([
            'status'=>$request->input('status'),
           'likeable_id'=>$request->input('likeable_id'),
           'likeable_type'=>$request->input('likeable_type'),
        ]);

       return Response::success(
           trans('like.success'),
           new LikeResource($like),
           Status::SUCCESS->value,
           StatusCode::SUCCESS->value,
       );


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $like=Auth::user()->likes()->find($id);

        return Response::success(
            trans('like.success'),
            new LikeResource($like),
            Status::SUCCESS->value,
            StatusCode::SUCCESS->value,
        );

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LikeRequest $request, string $id)
    {

        $result= Auth::user()->likes()->whereid($id)->update([
            'status'=>$request->input('status'),
            'likeable_id'=>$request->input('likeable_id'),
            'likeable_type'=>$request->input('likeable_type'),
        ]);


        if ($result) {
            $like=Auth::user()->likes()->find($id);
            return Response::success(
                trans('like.success'),
                new LikeResource($like),
                Status::SUCCESS->value,
                StatusCode::SUCCESS->value,
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        //
    }
}
