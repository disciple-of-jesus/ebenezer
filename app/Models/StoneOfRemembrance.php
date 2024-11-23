<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoneOfRemembrance extends Model
{
    public $timestamps = false;

    protected $fillable = ['nameOfStone', 'wayOfShowing', 'contextToWord'];
}
