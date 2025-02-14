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
                ->type('nameOfStone', 'Ik mag genieten van Uw werken die bij mij passen')
                ->type('wayOfShowing', 'Het geven van Uw vrede over mijn werk op mijn manier')
                ->type('contextToWord', 'Ik ben vrij')
                ->clickAndWaitForReload('#erectStoneButton')
                ->assertSee(text: 'Ik mag genieten van Uw werken die bij mij passen', ignoreCase: true)
                ->assertSee(text: 'door het geven van Uw vrede over mijn werk op mijn manier', ignoreCase: true)
                ->assertSee(text: 'Ik ben vrij', ignoreCase: true)
                ->type(field: 'query', value: 'Query will not yield results')
                ->clickAndWaitForReload('#walkByStonesButton')
                ->assertDontSee(text: 'Ik mag genieten van Uw werken die bij mij passen', ignoreCase: true)
                ->type(field: 'query', value: 'werk')
                ->clickAndWaitForReload('#walkByStonesButton')
                ->assertSee(text: 'Ik mag genieten van Uw werken die bij mij passen', ignoreCase: true)
        );
    }
}
