<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasUuids;

    /**
     * @var string
     */
    const string CREATED_AT = 'assignedAt';

    /**
     * @var string
     */
    const string UPDATED_AT = 'lastToiledAt';

    protected $fillable = ['nameOfWork'];

    protected function casts(): array
    {
        return [
            'nameOfWork' => 'encrypted',
        ];
    }
}
