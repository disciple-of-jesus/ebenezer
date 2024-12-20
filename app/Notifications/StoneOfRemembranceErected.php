<?php

namespace App\Notifications;

use App\Models\StoneOfRemembrance;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StoneOfRemembranceErected extends Notification
{
    public function __construct(private StoneOfRemembrance $stoneOfRemembrance)
    {
    }

    /**
     * @return string[]
     */
    public function via(): array
    {
        return ['broadcast', 'mail'];
    }

    public function toBroadcast(): BroadcastMessage
    {
        return (new BroadcastMessage($this->stoneOfRemembrance->toArray()))
            ->onConnection('sync');
    }

    public function toMail(): MailMessage
    {
        return (new MailMessage)
            ->subject("Do you remember God's lesson for you?")
            ->line($this->stoneOfRemembrance->nameOfStone)
            ->line($this->stoneOfRemembrance->wayOfShowing)
            ->line($this->stoneOfRemembrance->contextToWord);
    }
}
