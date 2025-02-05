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
                ->press('Toekennen')
                ->type('nameOfStone', $nameOfStone)
                ->type('wayOfShowing', ''.$wayOfShowing.'')
                ->type('contextToWord', $contextToWord)
                ->press('Oprichten')
                ->assertSee(text: $nameOfStone, ignoreCase: true)
                ->assertSee(text: $wayOfShowing, ignoreCase: true)
                ->assertSee(text: $contextToWord, ignoreCase: true)
                ->type(field: 'query', value: 'Query will not yield results')
                ->press('Zoeken')
                ->assertDontSee(text: $nameOfStone, ignoreCase: true)
                ->type(field: 'query', value: 'Work')
                ->press('Zoeken')
                ->assertSee(text: $nameOfStone, ignoreCase: true)
        );
    }
}
