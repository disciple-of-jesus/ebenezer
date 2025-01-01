<?php

namespace App\Notifications;

use App\Models\StoneOfRemembrance;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class StoneOfRemembranceErected extends Notification
{
    public function __construct(private StoneOfRemembrance $stoneOfRemembrance) {}

    /**
     * @return string[]
     */
    public function via(): array
    {
        return ['broadcast'];
    }

    public function toBroadcast(): BroadcastMessage
    {
        return (new BroadcastMessage($this->stoneOfRemembrance->toArray()))
            ->onConnection('sync');
    }
}
