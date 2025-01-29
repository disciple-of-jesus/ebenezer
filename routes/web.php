<?php

use App\Models\Space;
use App\Models\StoneOfRemembrance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));

Route::post('/spaces', function () {
    $space = Space::create();

    return redirect("/spaces/$space->id");
})->name('assign-space-to-erect-stones');

Route::get('/spaces/{space}', function (Space $space) {
    return view('space', ['space' => $space]);
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

    return redirect(route('walk-by-erected-stones', ['space' => $space->id]));
})->name('erect-stone-of-remembrance');
