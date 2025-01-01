<?php

use Laravel\Dusk\Browser;
use PHPUnit\Framework\Attributes\Test;
use Tests\DuskTestCase;

class AssignSpaceToErectStonesTest extends DuskTestCase
{
    #[Test]
    public function iCanAssignASpaceToErectMyStones(): void
    {
        $this->browse(
            fn (Browser $browser) => $browser->visit('/')
                ->press('Toekennen')
                ->assertPathBeginsWith('/spaces/')
        );
    }
}
