<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class StoneOfRemembrance extends Model
{
    use Searchable;

    const string CREATED_AT = 'erectedAt';

    const string UPDATED_AT = 'movedAt';

    protected $table = 'stones_of_remembrance';

    protected $fillable = ['nameOfStone', 'contextToWord'];

    public function toSearchableArray(): array
    {
        return [
            'nameOfStone' => $this->nameOfStone,
            'contextToWord' => $this->contextToWord,
        ];
    }
}
