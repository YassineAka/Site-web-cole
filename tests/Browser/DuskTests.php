<?php

namespace Tests\Browser;

use Tests\DuskTestCase ;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use PDO;

class DuskTests extends DuskTestCase
{
   /**
    * A Dusk test example.
    *
    * @return void
    */
   /*public function testAcceuil()
   {
       $this->browse(function (Browser $browser) {
           $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/')
           ->assertSee('Home')
           ->assertSee('List Of Teachers');
       });
       
   }

   public function testGoToServiceStudents()
   {
       $this->browse(function (Browser $browser) {
           $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/')
                    ->clickLink("List Of Teachers")
                   ->assertPathIs('/Projet-Attributions-Groupe-LesCerveaux/public/teachers');
               });
   }*/

   public function testAddStudentSuccesfull()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/courses')
                    ->value('#id', 'test')
                    ->pause(1000)
                    ->value('#name', 'title')
                    ->pause(1000)
                    ->press('#btn')
                    ->pause(1000)
                    ->assertSee("test");
        });
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $removeIdStudent="DELETE FROM course WHERE id='test'";
        $pdo->query($removeIdStudent);
        $pdo = null;
    }

}
