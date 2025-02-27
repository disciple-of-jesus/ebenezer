<?php

namespace App\Http\Controllers;

use App\Models\Space;

class AssignSpaceToErectStones
{
    public function __invoke()
    {
        $space = Space::create();

        return redirect(route(name: 'walk-by-erected-stones', parameters: ['space' => $space->id]));
    }
}
