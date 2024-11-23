<?php

use App\Models\StoneOfRemembrance;
use App\Notifications\StoneOfRemembranceErected;
use Illuminate\Support\Facades\Notification;

Schedule::call(function () {
    foreach (StoneOfRemembrance::all() as $stoneOfRemembrance) {
        Notification::sendNow(
            notifiables: $stoneOfRemembrance->user,
            notification: new StoneOfRemembranceErected($stoneOfRemembrance)
        );
    }
})->daily();
