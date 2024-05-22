<?php

    namespace App\Http\Controllers\Article;

    use App\Enums\Status;
    use App\Enums\StatusCode;
    use App\Facades\Response;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\Article\ArticleRequest;
    use App\Http\Resources\Article\ArticleResource;
    use App\Models\Article\Article;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use App\Enums\Article\Status as ArticleStatus;
    use function MongoDB\BSON\toJSON;

    class ArticleController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $articles = Auth::user()->articles()->get();

            $arrayArticleResource = [];

            foreach ($articles as $article) {
                $arrayArticleResource[] = new ArticleResource($article);
            }

            return Response::success(
                trans('article.getAll_success'),
                $arrayArticleResource,
                Status::SUCCESS->value,
                StatusCode::SUCCESS->value,
            );

        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(ArticleRequest $request)
        {
            $article = Auth::user()->articles()->create([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
                'status' => $request->input('status') ?? ArticleStatus::DRAFT->value,
            ]);

            return Response::success(
                trans('article.create_success'),
                new ArticleResource($article),
                Status::SUCCESS->value,
                StatusCode::CREATED->value,
            );
        }

        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            $article=Auth::user()->articles()->find($id);

            return Response::success(
                trans('article.get_success'),
                new ArticleResource($article),
                Status::SUCCESS->value,
                StatusCode::SUCCESS->value
            );
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, Article $article)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            $article=Article::destroy($id);

            dd($article);
            $arr=["success"=>"delete"];
            return json_encode($arr);



        }
    }
