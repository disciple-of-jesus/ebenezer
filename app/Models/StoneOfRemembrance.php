<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoneOfRemembrance extends Model
{
    public $timestamps = false;

    protected $table = 'stones_of_remembrance';

    protected $fillable = ['nameOfStone', 'wayOfShowing', 'contextToWord'];

    public function space(): BelongsTo
    {
        return $this->belongsTo(Space::class);
    }
}
