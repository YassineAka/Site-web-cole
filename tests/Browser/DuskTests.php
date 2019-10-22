<?php

namespace Tests\Browser;

use Tests\DuskTestCase ;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DuskTests extends DuskTestCase
{
   /**
    * A Dusk test example.
    *
    * @return void
    */
   public function testAcceuil()
   {
       $this->browse(function (Browser $browser) {
           $browser->visit('/~g42933/Projet-Attributions-Groupe-LesCerveaux/public/')
           ->assertSee('Home')
           ->assertSee('List Of Teachers');
       });
       
   }

   public function testGoToServiceStudents()
   {
       $this->browse(function (Browser $browser) {
           $browser->visit('/~g42933/Projet-Attributions-Groupe-LesCerveaux/public/')
                    ->clickLink("List Of Teachers")
                   ->assertPathIs('/~g42933/Projet-Attributions-Groupe-LesCerveaux/public/teachers');
               });
   }
}
