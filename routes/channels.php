<?php

use App\Models\Space;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.Spaces.{id}', function (Space $space, string $id) {
    return $space->id === $id;
});
