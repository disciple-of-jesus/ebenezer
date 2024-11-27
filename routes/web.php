<?php

use App\Models\StoneOfRemembrance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', ['stoneOfRemembrances' => StoneOfRemembrance::all()]);
})->middleware('auth.basic');

Route::post('/add', function (Request $request) {
    $request->validate([
        'nameOfStone' => 'required',
        'wayOfShowing' => 'required',
        'contextToWord' => 'required',
    ]);

    StoneOfRemembrance::create([
        'nameOfStone' => $request->string('nameOfStone'),
        'wayOfShowing' => $request->string('wayOfShowing'),
        'contextToWord' => $request->string('contextToWord'),
    ]);

    return redirect('/');
})->middleware('auth.basic');
