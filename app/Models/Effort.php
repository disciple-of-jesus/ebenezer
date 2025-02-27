<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Effort extends Model
{
    use HasUuids;

    const string CREATED_AT = 'toiledAt';

    const string UPDATED_AT = 'lastToiledAt';

    protected $fillable = ['summaryOfEffort'];
}
