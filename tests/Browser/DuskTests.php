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
  
    public function testAcceuil()
   {
       $this->browse(function (Browser $browser) {
           $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/')
            ->assertSee('Home');
       });
       
   }



   public function testAddTeachersSuccesfull()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/teachers')
                    ->press('#btnAdd')
                    ->value('#id', 'MOA')
                    ->pause(1000)
                    ->value('#nom', 'LaSquale')
                    ->pause(1000)
                    ->value('#prenom', 'Moha')
                    ->pause(1000)
                    ->press('#inscription')
                    ->pause(1000)
                    ->assertSee("MOA");
        });
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $removeIdTeacher="DELETE FROM teacher WHERE id='MOA'";
        $pdo->query($removeIdTeacher);
        $pdo = null;
    }
  public function testGoToServiceTeachers()
   {
       $this->browse(function (Browser $browser) {
           $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/')
                    ->clickLink("List Of Teachers")
                   ->assertPathIs('/Projet-Attributions-Groupe-LesCerveaux/public/teachers');
               });
   }


   public function testAddCourse()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/courses')
                    ->press('#btnAdd')
                    ->value('#id', 'test')
                    ->pause(1000)
                    ->value('#name', 'title')
                    ->pause(1000)
                    ->value('#nbHours', '65')
                    ->pause(1000)
                    ->press('#btn')
                    ->pause(1000)
                    ->assertSee("test");
        });
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $removeIdCourse="DELETE FROM course WHERE id='test'";
        $pdo->query($removeIdCourse);
        $pdo = null;
    }

    public function testGoToServiceCourse()
   {
       $this->browse(function (Browser $browser) {
           $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/')
                    ->clickLink("List Of Courses")
                   ->assertPathIs('/Projet-Attributions-Groupe-LesCerveaux/public/courses');
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

   public function testAddMissionSuccesfull()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/missions')             
                    ->press('#btnAdd')
                    ->value('#title', 'ceciEstUnTest')
                    ->pause(1000)
                    ->value('#nbHours', '10')
                    ->pause(1000)
                    ->select('#selector', 'Inscription')
                    ->pause(1000)
                    ->press('#button')
                    ->pause(1000)
                    ->assertSee("ceciEstUnTest");
        });
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $removeIdMission="DELETE FROM mission WHERE title='ceciEstUnTest'";
        $pdo->query($removeIdMission);
        $pdo = null;
    }
    public function testDeleteCourseSuccesfull()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $id="XXX";
        $name="Test selenium";
        $nbHours=45;
        $removeCourse="DELETE FROM course WHERE id='XXX'";
        $pdo->query($removeCourse);
        $addCourse="INSERT INTO course (`id`,`title`,`nbHours`) VALUES ('$id','$name','$nbHours')";
        $pdo->query($addCourse);
        $pdo = null;
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/courses')
                    ->press('#XXXtest')
                    ->pause(1000)
                    ->assertDontSee("XXX");
        });
       
    }
    public function testDeleteTeacherSuccesfull()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $id="XXX";
        $nom="Test";
        $prenom="selenium";
        $removeTeacher="DELETE FROM teacher WHERE id='XXX'";
        $pdo->query($removeTeacher);
        $addTeacher="INSERT INTO teacher (`id`,`name`,`firstName`) VALUES ('$id','$nom','$prenom')";
        $pdo->query($addTeacher);
        $pdo = null;
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/teachers')
                    ->press('#XXXtest')
                    ->pause(1000)
                    ->assertDontSee("XXX");
        });
       
    }
    


    public function testGoToServiceGroup()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/')
                     ->clickLink("List Of Groups")
                    ->assertPathIs('/Projet-Attributions-Groupe-LesCerveaux/public/groupes');
                });
    }

    
   public function testAddGroup()
   {
       $this->browse(function (Browser $browser) {
           $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/groupes')
                   ->press('#btnAdd')
                   ->value('#id', 'test')
                   ->pause(1000)
                   ->press('#btn')
                   ->pause(2000)
                   ->assertSee("test");
       });
       $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
       $removeIdCourse="DELETE FROM groupe WHERE id='test'";
       $pdo->query($removeIdCourse);
       $pdo = null;
   }

   public function testDeleteGroupSuccesfull()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $id="XXX";
        $removeGroup="DELETE FROM groupe WHERE id='XXX'";
        $pdo->query($removeGroup);
        $addGroup="INSERT INTO groupe (`id`) VALUES ('$id')";
        $pdo->query($addGroup);
        $pdo = null;
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/groupes')
                    ->press('#XXXtest')
                    ->pause(1000)
                    ->assertDontSee("XXX");
        });
       
    }

} 
   

