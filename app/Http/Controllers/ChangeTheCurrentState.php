<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class ChangeTheCurrentState
{
    public function __invoke(Request $request, Work $work)
    {
        $work->currentState = $request->get('currentState');

        $work->save();

        return redirect(route('enjoy-the-good-works'));
    }
}
