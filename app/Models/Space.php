<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Space extends Model
{
    use HasUuids;
    use Notifiable;

    public $timestamps = false;

    public function stonesOfRemembrance(): HasMany
    {
        return $this->hasMany(StoneOfRemembrance::class);
    }
}