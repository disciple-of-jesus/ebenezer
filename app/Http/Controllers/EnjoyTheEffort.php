<?php

namespace App\Http\Controllers;

use App\Models\Effort;
use App\Models\Work;
use Illuminate\Http\Request;

class EnjoyTheEffort
{
    public function __invoke(Request $request, Work $work)
    {
        $effort = new Effort([
            'summaryOfEffort' => $request->string('summaryOfEffort'),
        ]);

        $work->effort()->save($effort);

        return redirect(route('enjoy-the-good-works'));
    }
}
