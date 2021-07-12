<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    public function user():BelongsTo //戻り値の型をBelongsToに指定
    {
        //articleとuserは多対1
        return $this->belongsTo('App\User');
    }
}
