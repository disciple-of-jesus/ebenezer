<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Effort extends Model
{
    use HasUuids;

    /**
     * @var string
     */
    const string CREATED_AT = 'toiledAt';

    /**
     * @var string
     */
    const string UPDATED_AT = 'lastToiledAt';

    protected $fillable = ['summaryOfEffort'];
}
