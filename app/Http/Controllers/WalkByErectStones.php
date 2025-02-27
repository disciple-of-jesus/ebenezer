<?php

namespace App\Http\Controllers;

use App\Models\Space;
use App\Models\StoneOfRemembrance;
use Illuminate\Http\Request;

class WalkByErectStones
{
    public function __invoke(Request $request, Space $space)
    {
        if ($query = $request->query('query')) {
            $listOfStones = StoneOfRemembrance::search($query)
                ->where(field: 'space_id', value: $space->id)
                ->get();
        } else {
            $listOfStones = $space->stonesOfRemembrance()->get();
        }

        return inertia('WalkByErectedStones', ['space' => $space, 'stonesOfRemembrance' => $listOfStones]);
    }
}
