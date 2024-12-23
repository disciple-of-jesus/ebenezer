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

    protected $fillable = ['nameOfStone', 'wayOfShowing', 'contextToWord'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
