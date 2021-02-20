<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BetSelect extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bet_id', 'home', 'away', 'selection',
    ];

    protected $table = "bet_selects";
}
