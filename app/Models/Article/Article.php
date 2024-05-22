<?php

namespace App\Models\Article;

use App\Models\User;
use Database\Factories\Article\ArticleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\Factory;

class Article extends Model
{
    use HasFactory;

    protected $fillable=[
      'title',
      'body',
      'status',
      'user_id'
    ];


	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	protected static function newFactory(): ArticleFactory|Factory
	{
		return ArticleFactory::new();
	}

}
