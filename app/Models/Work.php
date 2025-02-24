<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function effort(): HasMany
    {
        return $this->hasMany(Effort::class);
    }

    protected function casts(): array
    {
        return [
            'nameOfWork' => 'encrypted',
        ];
    }
}
