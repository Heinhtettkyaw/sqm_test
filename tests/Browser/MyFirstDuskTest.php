<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MyFirstDuskTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                ->type('a', 3)
                ->type('b', 1)
                ->press('Execute')
                ->assertPathIs('/calc')
                ->assertSee('4');
        });

        $this->browse(function ($browser) {
            $browser->visit('/')
                ->type('a', 10)
                ->type('b', 2)
                ->select('action', '/')
                ->press('Execute')
                ->assertPathIs('/calc')
                ->assertSee('5');
        });
        $this->browse(function ($browser) {
            $browser->visit('/')
                ->type('a', 10)
                ->type('b', 2)
                ->select('action', '-')
                ->press('Execute')
                ->assertPathIs('/calc')
                ->assertSee('8');
        });
        $this->browse(function ($browser) {
            $browser->visit('/')
                ->type('a', 10)
                ->type('b', 2)
                ->select('action', '*')
                ->press('Execute')
                ->assertPathIs('/calc')
                ->assertSee('20');
        });
    }
}
