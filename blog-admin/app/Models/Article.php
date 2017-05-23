<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    protected $table = 'lsl_article';

    public $guarded = ['_token'];

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsToMany(Users::class,'lsl_collect','art_id','user_id');

    }
}
