<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tdbk extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_name', 'file_type', 'caption',
    ];

    protected $table = "today-bookings";
    
}
