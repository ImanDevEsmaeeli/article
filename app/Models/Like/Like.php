<?php

namespace App\Models\Like;

use App\Models\Article\Article;
use App\Models\User;
use Database\Factories\Like\LikeFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    use HasFactory;

    protected $fillable=[
        'status',
        'user_id',
        'article_id'
    ];

    protected static function newFactory(): LikeFactory|Factory
    {
        return LikeFactory::new();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

}
