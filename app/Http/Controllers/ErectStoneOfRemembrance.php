<?php

namespace App\Http\Controllers;

use App\Models\Space;
use App\Models\StoneOfRemembrance;
use Illuminate\Http\Request;

class ErectStoneOfRemembrance
{
    public function __invoke(Space $space, Request $request)
    {
        $request->validate([
            'nameOfStone' => 'required',
            'contextToWord' => 'required',
        ]);

        $stoneOfRemembrance = new StoneOfRemembrance([
            'nameOfStone' => $request->string('nameOfStone'),
            'contextToWord' => $request->string('contextToWord'),
        ]);

        $space->stonesOfRemembrance()->save($stoneOfRemembrance);

        return redirect(route(name: 'walk-by-erected-stones', parameters: ['space' => $space->id]));
    }
}
