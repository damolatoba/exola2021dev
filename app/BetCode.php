<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BetCode extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bet_code', 'odds',
    ];

    protected $table = "bet_codes";
}
