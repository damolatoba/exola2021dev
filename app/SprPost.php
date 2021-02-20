<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SprPost extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_name', 'file_type', 'social_media', 'caption', 'lct', 'lcf', 'dct', 'dcf', 'comment_count',
    ];

    protected $table = "spr_posts";
}
