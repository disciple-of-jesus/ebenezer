<?php

namespace Tests\Feature;

use App\Models\Space;
use App\Models\StoneOfRemembrance;
use App\Notifications\StoneOfRemembranceErected;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class WalkByErectedStonesTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function iCanWalkByErectedStones(): void
    {
        Notification::fake();

        $space = Space::factory()->createOne();

        $stoneOfRemembrance = StoneOfRemembrance::factory()->makeOne([
            'nameOfStone' => 'God desires full surrender',
            'wayOfShowing' => 'Me running in circles, YouTube videos, my mentor',
            'contextToWord' => 'I cannot bring forth fruit on my own. Only God can do a work in me. He desires complete surrender, because He will not do anything that I do not want.',
        ]);

        $space->stonesOfRemembrance()->save($stoneOfRemembrance);

        $this->artisan('schedule:test')
            ->expectsQuestion('Which command would you like to run?', 'Callback')
            ->assertSuccessful();

        Notification::assertSentTo(
            notifiable: $space,
            notification: function (StoneOfRemembranceErected $notification) {
                $broadcastedNotification = $notification->toBroadcast();

                return $broadcastedNotification->data['nameOfStone'] === 'God desires full surrender'
                    && $broadcastedNotification->data['wayOfShowing'] === 'Me running in circles, YouTube videos, my mentor'
                    && $broadcastedNotification->data['contextToWord'] === 'I cannot bring forth fruit on my own. Only God can do a work in me. He desires complete surrender, because He will not do anything that I do not want.';
            }
        );
    }
}
