<?php

use App\Http\Controllers\AssignGodlyWork;
use App\Http\Controllers\AssignSpaceToErectStones;
use App\Http\Controllers\ChangeTheCurrentState;
use App\Http\Controllers\EnjoyTheEffort;
use App\Http\Controllers\EnjoyTheGoodWorks;
use App\Http\Controllers\ErectStoneOfRemembrance;
use App\Http\Controllers\WalkByErectStones;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));

Route::prefix('/spaces')->group(function () {
    Route::name('assign-space-to-erect-stones')->post('', AssignSpaceToErectStones::class);
    Route::name('walk-by-erected-stones')->get('/{space}', WalkByErectStones::class);
    Route::name('erect-stone-of-remembrance')->post('/{space}/stones-of-remembrance', ErectStoneOfRemembrance::class);
});

Route::prefix('/works')->group(function () {
    Route::name('enjoy-the-good-works')->get('', EnjoyTheGoodWorks::class);
    Route::name('assign-godly-work')->post('', AssignGodlyWork::class);
    Route::name('enjoy-the-effort')->post('/{work}/effort', EnjoyTheEffort::class);
    Route::name('change-the-current-state')->put('/{work}', ChangeTheCurrentState::class);
});
