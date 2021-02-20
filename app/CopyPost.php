<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CopyPost extends Model
{
    //
    protected $fillable = [
        'content',
    ];

    protected $table = "copy_posts";
}
