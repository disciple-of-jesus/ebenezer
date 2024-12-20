<?php

use App\Models\StoneOfRemembrance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth.basic')->group(function () {
    Route::get('/', function () {
        return view('index', ['stoneOfRemembrances' => StoneOfRemembrance::all()]);
    });

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
    });

});
