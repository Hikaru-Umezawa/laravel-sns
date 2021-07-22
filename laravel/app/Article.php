<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];

    public function user(): BelongsTo //戻り値の型をBelongsToに指定
    {
        //articleとuserは多対1
        return $this->belongsTo('App\User');
    }

    public function likes(): BelongsToMany
    {
        //articleとlikesは多対多
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }

    public function isLikedBy(?User $user): bool
    {
        //likesテーブルに$userのidが存在する場合はtrue,存在しなければfalse
        return $user
            ? (bool) $this->likes->where('id', $user->id)->count()
            : false;
    }
}
