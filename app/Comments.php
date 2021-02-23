<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    protected $fillable = [
        'username', 'comment', 'post_id', 'reply_to', 'is_deleted',
    ];

    protected $table = "comments";
}
