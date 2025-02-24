<?php

use App\Models\Space;
use App\Models\StoneOfRemembrance;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));

Route::post('/spaces', function () {
    $space = Space::create();

    return redirect(route(name: 'walk-by-erected-stones', parameters: ['space' => $space->id]));
})->name('assign-space-to-erect-stones');

Route::get('/spaces/{space}', function (Space $space, Request $request) {
    if ($query = $request->query('query')) {
        $listOfStones = StoneOfRemembrance::search($query)
            ->where(field: 'space_id', value: $space->id)
            ->get();
    } else {
        $listOfStones = $space->stonesOfRemembrance()->get();
    }

    return view('space', ['space' => $space, 'stonesOfRemembrance' => $listOfStones]);
})->name('walk-by-erected-stones');

Route::post('/spaces/{space}/stones-of-remembrance', function (Space $space, Request $request) {
    $request->validate([
        'nameOfStone' => 'required',
        'wayOfShowing' => 'required',
        'contextToWord' => 'required',
    ]);

    $stoneOfRemembrance = new StoneOfRemembrance([
        'nameOfStone' => $request->string('nameOfStone'),
        'wayOfShowing' => $request->string('wayOfShowing'),
        'contextToWord' => $request->string('contextToWord'),
    ]);

    $space->stonesOfRemembrance()->save($stoneOfRemembrance);

    return redirect(route(name: 'walk-by-erected-stones', parameters: ['space' => $space->id]));
})->name('erect-stone-of-remembrance');

Route::get('/works', function () {
    $works = Work::all();

    return view('works', ['works' => $works]);
})->name('enjoy-the-good');

Route::post('/works', function (Request $request) {
    $work = new Work([
        'nameOfWork' => $request->string('nameOfWork'),
    ]);

    $work->save();

    return redirect(route('enjoy-the-good'));
})->name('assign-godly-work');
