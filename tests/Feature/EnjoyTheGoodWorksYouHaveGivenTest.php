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
                ->assertSee('Nieuwsbrief van Yachad versturen')
        );
    }
}
