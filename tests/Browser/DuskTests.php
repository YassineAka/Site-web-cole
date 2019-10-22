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
           $browser->visit('Projet-Attributions-Groupe-LesCerveaux/public/')
           ->assertSee('Home')
           ->assertSee('List Of Teachers');
       });
       
   }

   public function testGoToServiceTeachers()
   {
       $this->browse(function (Browser $browser) {
           $browser->visit('Projet-Attributions-Groupe-LesCerveaux/public/')
                    ->clickLink("List Of Teachers")
                   ->assertPathIs('/Projet-Attributions-Groupe-LesCerveaux/public/teachers');
               });
   }

   public function testGoToServiceMissions()
   {
       $this->browse(function (Browser $browser) {
           $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/')
                    ->clickLink("List Of Missions")
                   ->assertPathIs('/Projet-Attributions-Groupe-LesCerveaux/public/missions');
               });
   }
   
}
