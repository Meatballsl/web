<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'lsl_comment';

    protected $fillable = ['content','user_id','created_at'];

    public $timestamps = false;

    public function artice()
    {
        return $this->belongsTo(Article::class);
    }

    public function reply()
    {
        return $this->hasMany(Reply::class);
    }
}
