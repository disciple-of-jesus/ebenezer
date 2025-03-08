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
        $this->browse(
            fn (Browser $browser) => $browser->visit('/')
                ->press('Toekennen')
                ->waitUntilMissing('#nprogess')
                ->type('nameOfStone', 'Ik mag genieten van Uw werken die bij mij passen')
                ->type('contextToWord', 'Ik ben vrij')
                ->press('#erectStoneButton')
                ->waitUntilMissing('#nprogess')
                ->assertSee(text: 'Ik mag genieten van Uw werken die bij mij passen', ignoreCase: true)
                ->assertSee(text: 'Ik ben vrij', ignoreCase: true)
                ->type(field: 'query', value: 'Query will not yield results')
                ->press('#walkByStonesButton')
                ->waitUntilMissing('#nprogess')
                ->assertDontSee(text: 'Ik mag genieten van Uw werken die bij mij passen', ignoreCase: true)
                ->type(field: 'query', value: 'werk')
                ->press('#walkByStonesButton')
                ->waitUntilMissing('#nprogess')
                ->assertSee(text: 'Ik mag genieten van Uw werken die bij mij passen', ignoreCase: true)
        );
    }
}
