<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = [
        'title', 'image_name', 'content', 'rank',
    ];

    protected $table = "articles";
}
