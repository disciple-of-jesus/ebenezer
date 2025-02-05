<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Space extends Model
{
    use HasUuids;

    public $timestamps = false;

    public function stonesOfRemembrance(): HasMany
    {
        return $this->hasMany(StoneOfRemembrance::class);
    }
}
