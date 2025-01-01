<?php

namespace App\Models;

use Database\Factories\StoneOfRemembranceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoneOfRemembrance extends Model
{
    /** @use HasFactory<StoneOfRemembranceFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $table = 'stones_of_remembrance';

    protected $fillable = ['nameOfStone', 'wayOfShowing', 'contextToWord'];

    public function space(): BelongsTo
    {
        return $this->belongsTo(Space::class);
    }
}
