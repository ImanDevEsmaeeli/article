<?php

    namespace App\Http\Controllers\Like;

    use App\Enums\like\LikeType;
    use App\Enums\Status;
    use App\Enums\StatusCode;
    use App\Facades\Response;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\Like\LikeRequest;
    use App\Http\Resources\Like\LikeResource;
    use App\Models\User;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Support\Facades\Auth;


    class LikeController extends Controller
    {

        public function __invoke(LikeRequest $request)
        {

            $user = Auth::user();
            $like_object = $user->likes()->where('likeable_id', $request->input('likeable_id'));

            if (!$like_object->exists()) {
                return $this->create($user, $request);
            } else {
                return $this->update($like_object, $request);
            }
        }

        private function create(User $user, LikeRequest $request)
        {
            $like = $user->likes()->create([
                'status' => $request->input('status'),
                'likeable_id' => $request->input('likeable_id'),
                'likeable_type' => LikeType::ARTICLE->value,
            ]);

            return Response::success(
                trans('like.success'),
                new LikeResource($like),
                Status::SUCCESS->value,
                StatusCode::SUCCESS->value,
            );
        }


        private function update(HasMany $like_object, LikeRequest $request)
        {
            $like_object->update([
                'status' => $request->input('status'),
                'likeable_id' => $request->input('likeable_id'),
                'likeable_type' => LikeType::ARTICLE->value,
            ]);

            return Response::success(
                trans('like.success'),
                new LikeResource($like_object->first()),
                Status::SUCCESS->value,
                StatusCode::SUCCESS->value,
            );

        }

    }
