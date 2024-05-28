<?php

    namespace App\Http\Controllers\Like;

    use App\Enums\Status;
    use App\Enums\StatusCode;
    use App\Facades\Response;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\Like\LikeRequest;
    use App\Http\Resources\Like\LikeResource;
    use App\Models\Article\Article;
    use App\Models\Like\Like;
    use App\Models\User;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;

    class LikeController extends Controller
    {

        public function __invoke(LikeRequest $request)
        {
            $user = Auth::user();
            $likeObject = $user->likes()->where('likeable_id', $request->input('likeable_id'));

            if (!$likeObject->exists()) {
               return $this->create($user, $request);
            } else {

              return  $this->update($likeObject, $request);
            }
        }

        public function create(User $user, LikeRequest $request)
        {
            $like = $user->likes()->create([
                'status' => $request->input('status'),
                'likeable_id' => $request->input('likeable_id'),
                'likeable_type' => Article::class,
            ]);

            return Response::success(
                trans('like.success'),
                new LikeResource($like),
                Status::SUCCESS->value,
                StatusCode::SUCCESS->value,
            );
        }

        protected function update(HasMany $likeObject, LikeRequest $request)
        {

            $likeObject->update([
                'status' => $request->input('status'),
                'likeable_id' => $request->input('likeable_id'),
                'likeable_type' => Article::class,
            ]);

            return Response::success(
                trans('like.success'),
                new LikeResource($likeObject->first()),
                Status::SUCCESS->value,
                StatusCode::SUCCESS->value,
            );
        }
    }
