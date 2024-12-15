<?php

namespace Tests\Feature;

use App\Models\StoneOfRemembrance;
use App\Models\User;
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

        $user = User::factory()->create();
        $stoneOfRemembrance = StoneOfRemembrance::factory()->make();
        $user->stonesOfRemembrance()->save($stoneOfRemembrance);

        $this->artisan('schedule:test')
            ->expectsQuestion('Which command would you like to run?', 'Callback')
            ->assertSuccessful();

        Notification::assertSentTo(
            notifiable: $user,
            notification: fn(StoneOfRemembranceErected $notification) => true
        );
    }
}
