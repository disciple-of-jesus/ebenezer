<?php

use App\Models\StoneOfRemembrance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', ['stoneOfRemembrances' => StoneOfRemembrance::all()]);
})->middleware('auth.basic');

Route::post('/add', function (Request $request) {
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

    /** @var User $authenticatedUser */
    $authenticatedUser = $request->user();

    $authenticatedUser->stonesOfRemembrance()->save($stoneOfRemembrance);

    return redirect('/');
})->middleware('auth.basic');
