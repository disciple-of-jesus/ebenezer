<?php

namespace App\Models;

use App\CurrentState;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Work extends Model
{
    use HasUuids;

    const string CREATED_AT = 'assignedAt';

    const string UPDATED_AT = 'lastToiledAt';

    protected $attributes = ['currentState' => CurrentState::TO_DO];

    protected $fillable = ['nameOfWork'];

    public function effort(): HasMany
    {
        return $this->hasMany(Effort::class);
    }

    protected function casts(): array
    {
        return [
            'currentState' => CurrentState::class,
            'nameOfWork' => 'encrypted',
        ];
    }
}
