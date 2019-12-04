<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use PDO;
use Tests\DuskTestCase;

class DuskTests extends DuskTestCase
{

    public function testAcceuil()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/')
                ->assertSee('Teachers')
                ->assertSee('Courses')
                ->assertSee('Missions')
                ->assertSee('Groups')
                ->assertSee('Attributions')
                ->assertSee('Version');
        });
    }

    public function testGoToServiceTeachers()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/')
                ->clickLink("Teachers")
                ->assertPathIs('/Projet-Attributions-Groupe-LesCerveaux/public/teachers');
        });
    }
    public function testAddTeachersSuccesfull()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/teachers')
                ->press('#btnAdd')
                ->value('#id', 'TES')
                ->pause(1000)
                ->value('#nom', 'LaSquale')
                ->pause(1000)
                ->value('#prenom', 'Moha')
                ->pause(1000)
                ->press('#inscription')
                ->pause(1000)
                ->assertSee("TES");
        });
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $removeIdTeacher = "DELETE FROM teacher WHERE id='TES'";
        $pdo->query($removeIdTeacher);
        $pdo = null;
    }

    public function testDeleteTeacherSuccesfull()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $id = "XXX";
        $nom = "Test";
        $prenom = "selenium";
        $removeTeacher = "DELETE FROM teacher WHERE id='XXX'";
        $pdo->query($removeTeacher);
        $addTeacher = "INSERT INTO teacher (`id`,`name`,`firstName`) VALUES ('$id','$nom','$prenom')";
        $pdo->query($addTeacher);
        $pdo = null;
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/teachers')
                ->press('#XXXtest')
                ->pause(1000)
                ->assertDontSee("XXX");
        });
    }

   public function testEditInfoTeacher()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/teacher/info/ABS')
            ->press('#btnEdit')
            ->value('#id', 'TES')
            ->value('#nom', 'Test')
            ->value('#prenom', 'Coucou')
            ->press('#modif')
                ->pause(1000)
                ->assertSee("Test Coucou");
        });
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $removeTeacher = "DELETE FROM teacher WHERE id='TES'";
        $pdo->query($removeTeacher);
        $addTeacher = "INSERT INTO teacher (`id`,`name`,`firstName`) VALUES ('ABS','Absil','Romain')";
        $pdo->query($addTeacher);
        $pdo = null;
    }
    public function testGoToServiceCourse()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/')
                ->clickLink("Courses")
                ->assertPathIs('/Projet-Attributions-Groupe-LesCerveaux/public/courses');
        });
    }

    public function testAddCourse()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/courses')
                ->press('#btnAdd')
                ->value('#id', 'TESTA')
                ->pause(1000)
                ->value('#name', 'title')
                ->pause(1000)
                ->value('#nbHours', '65')
                ->pause(1000)
                ->press('#bou')
                ->pause(1000)
                ->assertSee("TESTA");
        });
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $removeIdCourse = "DELETE FROM course WHERE id='TESTA'";
        $pdo->query($removeIdCourse);
        $pdo = null;
    }

    public function testDeleteCourseSuccesfull()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $id = "XXX";
        $name = "Test selenium";
        $nbHours = 45;
        $removeCourse = "DELETE FROM course WHERE id='XXX'";
        $pdo->query($removeCourse);
        $addCourse = "INSERT INTO course (`id`,`title`,`nbHours`) VALUES ('$id','$name','$nbHours')";
        $pdo->query($addCourse);
        $pdo = null;
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/courses')
                ->press('#XXXtest')
                ->pause(1000)
                ->assertDontSee("XXX");
        });

    }

    public function testGoToServiceMissions()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/')
                ->clickLink("Missions")
                ->assertPathIs('/Projet-Attributions-Groupe-LesCerveaux/public/missions');
        });
    }

    public function testAddMissionSuccesfull()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/missions')

                ->press('#btnAdd')
                ->value('#title', 'TESTA')
                ->pause(1000)
                ->value('#nbHours', '10')
                ->pause(1000)
                ->select('#selector', 'Stage')
                ->pause(1000)
                ->press('#button')
                ->pause(1000)
                ->assertSee("Testa");
        });
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $removeIdMission = "DELETE FROM mission WHERE title='TESTA'";
        $pdo->query($removeIdMission);
        $pdo = null;
    }
    public function testModifyMission()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/missions')
                ->press('.selenium')
                ->pause(2000)
                ->assertSee("Modifier mission")
                ->assertSee("Mission")
                ->assertSee("Heures")
                ->assertSee("Catégorie");
        });
    }

    public function testModifyMissionByTitle()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/missions')
                ->press('.selenium')
                ->pause(2000)
                ->value("#missionForm", "testSelenium")
                ->value("#heureForm", "-1")
                ->press("#bttnModify")
                ->assertSee("testSelenium")
                ->assertSee("-1");
        });
    }
    public function testAddCatSuccesfull()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/missions')
                ->press('#btnAddCat')
                ->value('#titleCat', 'pipi')
                ->pause(1000)
                ->press('#buttonCat')
                ->pause(1000)
                ->assertSee("pipi");

        });
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $removeIdCat = "DELETE FROM category WHERE id='pipi'";
        $pdo->query($removeIdCat);
        $pdo = null;
    }

    public function testDeleteCatSuccesfull()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/missions')

                ->press('#btnDeleteCat')
                ->select('#selectorDeleteCat', 'Stage')
                ->pause(1000)
                ->press('#buttonDeleteCat')
                ->pause(1000)
                ->press('#btnDeleteCat')
                ->assertDontSee('Stage');

        });
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $removeIdCat = "DELETE FROM category WHERE id='Stage'";
        $pdo->query($removeIdCat);
        $pdo = null;
    }

    public function testGoToServiceGroup()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/')
                ->clickLink("Groups")
                ->assertPathIs('/Projet-Attributions-Groupe-LesCerveaux/public/groupes');
        });
    }

    public function testAddGroup()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/groupes')
                ->press('#btnAdd')
                ->value('#id', 'TESTA')
                ->pause(1000)
                ->press('#inscription')
                ->pause(2000)
                ->assertSee("TESTA");
        });
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $removeIdCourse = "DELETE FROM groupe WHERE id='TESTA'";
        $pdo->query($removeIdCourse);
        $pdo = null;
    }

    public function testDeleteGroupSuccesfull()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $id = "XXX";
        $removeGroup = "DELETE FROM groupe WHERE id='XXX'";
        $pdo->query($removeGroup);
        $addGroup = "INSERT INTO groupe (`id`) VALUES ('$id')";
        $pdo->query($addGroup);
        $pdo = null;
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/groupes')
                ->press('#XXXtest')
                ->pause(1000)
                ->assertDontSee("XXX");
        });
    }

    public function testGoToServicAttributions()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/')
                ->clickLink("Attributions")
                ->assertPathIs('/Projet-Attributions-Groupe-LesCerveaux/public/attributions');
        });
    }

    public function testAttributionsCourseToGroups()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Projet-Attributions-Groupe-LesCerveaux/public/attributions')

                ->press('#btn_cours_to_groups')
                ->select('#slctr_course', 'SYSG5')
                ->pause(1000)
                ->check('#A111')
                ->check('#A112')
                ->check('#B111')

                ->press('#send_cours_to_groups')
                ->pause(5000)
                ->assertSee("SYSG5", "A111")
                ->assertSee("SYSG5", "A112")
                ->assertSee("SYSG5", "E111");

        });
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $removeCourseGroup = "DELETE FROM course_groups WHERE course='SYSG5'";
        $pdo->query($removeCourseGroup);
        $pdo = null;
    }
    
    
}
