<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class AssignGodlyWork
{
    public function __invoke(Request $request)
    {
        $work = new Work([
            'nameOfWork' => $request->string('nameOfWork'),
        ]);

        $work->save();

        return redirect(route('enjoy-the-good-works'));
    }
}
