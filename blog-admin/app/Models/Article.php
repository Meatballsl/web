<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'lsl_article';

    public $guarded = ['_token'];
}
