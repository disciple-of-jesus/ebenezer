<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class StoneOfRemembrance extends Model
{
    use Searchable;

    /**
     * @var string
     */
    const string CREATED_AT = 'erectedAt';

    /**
     * @var string
     */
    const string UPDATED_AT = 'movedAt';

    protected $table = 'stones_of_remembrance';

    protected $fillable = ['nameOfStone', 'wayOfShowing', 'contextToWord'];

    public function toSearchableArray(): array
    {
        return [
            'nameOfStone' => $this->nameOfStone,
            'wayOfShowing' => $this->wayOfShowing,
            'contextToWord' => $this->contextToWord,
        ];
    }
}
