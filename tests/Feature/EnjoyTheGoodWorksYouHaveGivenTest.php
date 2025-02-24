<?php

namespace Tests\Feature;

use Laravel\Dusk\Browser;
use PHPUnit\Framework\Attributes\Test;
use Tests\DuskTestCase;

class EnjoyTheGoodWorksYouHaveGivenTest extends DuskTestCase
{
    #[Test]
    public function iCanEnjoyTheGoodWorksYouHaveGiven(): void
    {
        $this->browse(
            fn (Browser $browser) => $browser->visit('/works')
                ->assertSee('(Goede) werken')
                ->type('nameOfWork', 'Nieuwsbrief van Yachad versturen')
                ->clickAndWaitForReload('#assignWork')
                ->assertSee(text: 'Nieuwsbrief van Yachad versturen', ignoreCase: true)
                ->type('summaryOfEffort', 'Mail bekeken van Jan-Henk Soepenberg')
                ->clickAndWaitForReload('#enjoyEffort')
                ->assertSee('Mail bekeken van Jan-Henk Soepenberg')
        );
    }
}
