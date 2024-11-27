<?php

namespace Tests\Feature;

use Laravel\Dusk\Browser;
use PHPUnit\Framework\Attributes\Test;
use Tests\DuskTestCase;

class ErectStoneOfRemembranceTest extends DuskTestCase
{
    #[Test]
    public function iCanErectAStoneOfRemembrance(): void
    {
        $nameOfStone = 'I am free to enjoy works that fit who I am';
        $wayOfShowing = 'By granting me His peace over developing software, making music and through my teacher';
        $contextToWord = 'I am free';

        $this->browse(
            fn (Browser $browser) => $browser->loginAs('test@example.com')
                ->visit('/')
                ->assertTitle('Ebenezer')
                ->type('nameOfStone', $nameOfStone)
                ->type('wayOfShowing', ''.$wayOfShowing.'')
                ->type('contextToWord', $contextToWord)
                ->press('submit')
                ->assertSee($nameOfStone)
                ->assertSee($wayOfShowing)
                ->assertSee($contextToWord)
        );
    }
}
