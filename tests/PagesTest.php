<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PagesTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPanelAdministrativoAsNormalUser()
    {

        $this->visit('PanelAdministrativo')
        ->see('Login');
    }

    public function testPanelAdministrativoAsRegiteredUser()
    {
        $user=User::whereUsuario('Giorgiosaud')->first();
        $this->actingAs($user)
            ->visit('PanelAdministrativo')
            ->see('Bienvenid@ Jorge Saud');
    }
    public function testVisitHome(){
        $this->visit('/es')
            ->see('Slider');
    }
}
