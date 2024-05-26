<?php

namespace App\Models\Article;

use App\Models\Like\Like;
use App\Models\User;
use Database\Factories\Article\ArticleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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

    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class,'likeable');
    }

	protected static function newFactory(): ArticleFactory|Factory
	{
		return ArticleFactory::new();
	}
}
