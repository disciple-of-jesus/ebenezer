<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class StoneOfRemembrance extends Model
{
    use Searchable;

    public $timestamps = false;

    protected $table = 'stones_of_remembrance';

    protected $fillable = ['nameOfStone', 'wayOfShowing', 'contextToWord'];

    public function space(): BelongsTo
    {
        return $this->belongsTo(Space::class);
    }

    public function toSearchableArray(): array
    {
        return [
            'nameOfStone' => $this->nameOfStone,
            'wayOfShowing' => $this->wayOfShowing,
            'contextToWord' => $this->contextToWord,
        ];
    }
}
