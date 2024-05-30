<?php

	namespace App\Enums\like;

	use App\Models\Article\Article;
    use Illuminate\Database\Eloquent\Model;

    enum LikeType: string
    {
        case ARTICLE= Article::class;

	}
