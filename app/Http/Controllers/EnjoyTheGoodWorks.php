<?php

namespace App\Http\Controllers;

use App\Models\Work;

class EnjoyTheGoodWorks
{
    public function __invoke()
    {
        $works = Work::all();

        return view('works', ['works' => $works]);
    }
}
