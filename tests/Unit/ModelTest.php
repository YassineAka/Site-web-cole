<?php
namespace Tests\Unit;

use App\Http\Model\Model;
use PDO;
use Tests\TestCase;

class ModelTest extends TestCase
{
   
    public function testGetAllTeachers()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $requetes = "SELECT teacher.id, teacher.name,teacher.firstName
                     From teacher ";
        $result = $pdo->query($requetes);
        $pdo = null;
        $this->assertSame($result->rowCount(), count(Model::getAllTeachers()));
    }
    
    public function testGetAllTeachers1()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $requetes = "SELECT teacher.id, teacher.name,teacher.firstName
                     From teacher ";
        $result = $pdo->query($requetes);
        $pdo = null;
        $this->assertSame($result->rowCount(), count(Model::getAllTeachers()));
    }
    
    public function testGetAllTeachers2()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $requetes = "SELECT teacher.id, teacher.name,teacher.firstName
                     From teacher ";
        $result = $pdo->query($requetes);
        $pdo = null;
        $this->assertSame($result->rowCount(), count(Model::getAllTeachers()));
    }
    
    public function testGetAllTeachers3()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $requetes = "SELECT teacher.id, teacher.name,teacher.firstName
                     From teacher ";
        $result = $pdo->query($requetes);
        $pdo = null;
        $this->assertSame($result->rowCount(), count(Model::getAllTeachers()));
    }
    
    public function testGetAllTeachers4()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $requetes = "SELECT teacher.id, teacher.name,teacher.firstName
                     From teacher ";
        $result = $pdo->query($requetes);
        $pdo = null;
        $this->assertSame($result->rowCount(), count(Model::getAllTeachers()));
    }
    
    public function testGetAllTeachers5()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $requetes = "SELECT teacher.id, teacher.name,teacher.firstName
                     From teacher ";
        $result = $pdo->query($requetes);
        $pdo = null;
        $this->assertSame($result->rowCount(), count(Model::getAllTeachers()));
    }
    public function testGetAllTeachers6()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $requetes = "SELECT teacher.id, teacher.name,teacher.firstName
                     From teacher ";
        $result = $pdo->query($requetes);
        $pdo = null;
        $this->assertSame($result->rowCount(), count(Model::getAllTeachers()));
    }

    public function testAddCourse()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $id = "Test";
        $name = "developpement";
        $nbHours = 45;
        $removeIdCours = "DELETE FROM course WHERE id='$id' AND title='$name' AND nbHours ='$nbHours'";
        Model::addCourse($id, $name, $nbHours);
        $requete = "SELECT * FROM course WHERE id='$id' AND title='$name' AND nbHours ='$nbHours'";
        $result = $pdo->query($requete);
        $verif = $result->rowCount();
        $pdo->query($removeIdCours);
        $pdo = null;
        $this->assertTrue($verif == 1);

    }

    public function testAddGroup()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $id = "Test";
        $removeIdGroup = "DELETE FROM groupe WHERE id='$id'";
        Model::addGroup($id);
        $requete = "SELECT * FROM groupe WHERE id='$id'";
        $result = $pdo->query($requete);
        $verif = $result->rowCount();
        $pdo->query($removeIdGroup);
        $pdo = null;
        $this->assertTrue($verif == 1);

    }
    public function testGetAllMissions()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $requetes = "SELECT mission.title, mission.nbHours,mission.cat
                  FROM mission";

        $result = $pdo->query($requetes);
        $pdo = null;
        $this->assertSame($result->rowCount(), count(Model::getAllMissions()));
    }
    public function testGetAllGroups()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $requetes = "SELECT groupe.id FROM groupe ";
        $result = $pdo->query($requetes);
        $pdo = null;
        $this->assertSame($result->rowCount(), count(Model::getAllGroupes()));
    }

    public function testGetCategorie()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $requetes = "SELECT category.id     FROM category";

        $result = $pdo->query($requetes);
        $pdo = null;
        $this->assertSame($result->rowCount(), count(Model::getCategorie()));
    }

   
    public function testAddMission()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $title = "Test";
        $nbHours = "10";
        $cat = "Inscription";
        $removeIdMission = "DELETE FROM mission WHERE title='$title' AND nbHours='$nbHours' AND cat='$cat'";
        Model::addMission($title, $nbHours, $cat);
        $requete = "SELECT * FROM mission WHERE title='$title' AND nbHours='$nbHours' AND cat='$cat'";
        $result = $pdo->query($requete);
        $verif = $result->rowCount();
        $pdo->query($removeIdMission);
        $pdo = null;
        $this->assertTrue($verif == 1);

    }

    public function testDeleteCourse()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $id = "Test";
        $name = "salut";
        $addCourse = "INSERT INTO course (`id`,`title`) VALUES ('$id','$name')";
        $pdo->query($addCourse);
        Model::deleteCourse($id);
        $requete = "SELECT * FROM course WHERE id='$id'";
        $result = $pdo->query($requete);
        $pdo = null;
        $this->assertTrue($result->rowCount() == 0);

    }

    public function testDelMission()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $title = "salut";
        $nbHours = "3";
        $cat = "Stage";
        $addMission = "INSERT INTO mission (`title`,`nbHours`,`cat`) VALUES ('$title','$nbHours','$cat')";
        $resultQ = $pdo->query($addMission);
        $this->assertTrue($resultQ->rowCount() <= 1);

        $idMission = "SELECT * FROM mission WHERE title='$title'";
        $idResult = $pdo->query($idMission);
        $row = $idResult->fetch();
        Model::deleteMission($row['id']);

        $idMission = $row['id'];
        $requete = "SELECT * FROM mission WHERE id= $idMission ";
        $result = $pdo->query($requete);

        $pdo = null;
        $this->assertTrue($result->rowCount() == 0);

    }

    public function testDeleteTeacher()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $id = "15";
        $nom = "rsp";
        $prenom = "tkt";
        $addTeacher = " INSERT INTO teacher VALUES ('$id','$nom','$prenom') ";
        $resultQ = $pdo->query($addTeacher);
        Model::deleteProf($id);
        $this->assertTrue($resultQ->rowCount() <= 1);
        $requete = "SELECT * FROM teacher WHERE id='$id'";
        $result = $pdo->query($requete);
        $pdo = null;
        $this->assertTrue($result->rowCount() == 0);

    }

    public function testDeleteGroup()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $id = "A000";
        $addGroup = " INSERT INTO groupe VALUES ('$id') ";
        $resultQ = $pdo->query($addGroup);
        Model::deleteGroup($id);
        $this->assertTrue($resultQ->rowCount() <= 1);
        $requete = "SELECT * FROM groupe WHERE id='$id'";
        $result = $pdo->query($requete);
        $pdo = null;
        $this->assertTrue($result->rowCount() == 0);

    }

    public function testCourseExist()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $requetes = "SELECT course.id, course.title, course.nbHours FROM course";
        $result = $pdo->query($requetes);
        $pdo = null;
        $this->assertSame($result->rowCount(), count(Model::getAllCourses()));
    }
    public function testAddCat()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $title = "Testosterone";
        $removeIdCat = "DELETE FROM category WHERE id='$title'";
        Model::addCategory($title);
        $requete = "SELECT * FROM category WHERE id='$title'";
        $result = $pdo->query($requete);
        $verif = $result->rowCount();
        $pdo->query($removeIdCat);
        $pdo = null;
        $this->assertTrue($verif == 1);
    }

    public function testModifyMission()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $title = "salut";
        $nbHours = 3;
        $cat = "Stage";
        $addMission = "INSERT INTO mission (`title`,`nbHours`,`cat`) VALUES ('$title','$nbHours','$cat')";
        $resultQ = $pdo->query($addMission);

        $idMission = "SELECT * FROM mission WHERE title='$title' AND nbHours=$nbHours";
        $idResult = $pdo->query($idMission);
        $row = $idResult->fetch();
        $nbHours = -1;
        Model::modifyMission($row['id'], $row['title'], $nbHours, $row['cat']);
        $idMission = $row['id'];
        $requete = "SELECT * FROM mission WHERE nbHours=$nbHours ";
        $result = $pdo->query($requete);
        $nbRow = $result->rowCount();
        $requete = "DELETE FROM mission WHERE id=$idMission ";
        $pdo->query($requete);
        $pdo = null;
        $this->assertTrue($nbRow == 1);
    }

    public function testModifyMissionByTitle()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $title = "aurevoir";
        $nbHours = 3;
        $cat = "Stage";
        $addMission = "INSERT INTO mission (`title`,`nbHours`,`cat`) VALUES ('$title','$nbHours','$cat')";
        $resultQ = $pdo->query($addMission);

        $idMission = "SELECT * FROM mission WHERE title='$title' AND nbHours=$nbHours";
        $idResult = $pdo->query($idMission);
        $row = $idResult->fetch();
        $title = "hello men";
        Model::modifyMission($row['id'], $title, $row['nbHours'], $row['cat']);
        $idMission = $row['id'];
        $requete = "SELECT * FROM mission WHERE title = '$title' ";
        $result = $pdo->query($requete);
        $nbRow = $result->rowCount();
        $requete = "DELETE FROM mission WHERE id=$idMission ";
        $pdo->query($requete);
        $pdo = null;
        $this->assertTrue($nbRow == 1);
    }

    public function testDeleteCat()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $id = "test";
        $addCat = " INSERT INTO category VALUES ('$id') ";
        $resultQ = $pdo->query($addCat);
        Model::deleteCat($id);
        $this->assertTrue($resultQ->rowCount() <= 1);
        $requete = "SELECT * FROM category WHERE id='$id'";
        $result = $pdo->query($requete);
        $pdo = null;
        $this->assertTrue($result->rowCount() == 0);

    }
     public function testGetAllCoursesGroups()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $requetes = "SELECT course_groups.course, course_groups.groupe
        FROM course_groups ";

        $result = $pdo->query($requetes);
        $pdo = null;
        $this->assertSame($result->rowCount(), count(Model::getAllCoursesGroups()));
    }

    public function testAddAttributionsCourseToGroups()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        $course = "WEBG5";
        $groups = "A111";

        $removeCourseGroup = "DELETE FROM course_groups WHERE course='$course' AND groupe='$groups'";
        Model::addAttributionsCourseToGroups($course, $groups);
        $requete = "SELECT * FROM course_groups WHERE course='$course' AND groupe='$groups'";
        $result = $pdo->query($requete);
        $verif = $result->rowCount();
        $pdo->query($removeCourseGroup);
        $pdo = null;
        $this->assertTrue($verif == 1);

    }
   
   public function testGetAllCoursesGroupsTeachers()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $requetes = "SELECT course_groups_teachers.course, course_groups_teachers.groupe,course_groups_teachers.teacher
        FROM course_groups_teachers ";

        $result = $pdo->query($requetes);
        $pdo = null;
        $this->assertSame($result->rowCount(), count(Model::getAllCoursesGroupsTeachers()));
    }

    public function  testGetAllCoursesGroupsNotAttributed()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $requetes = "SELECT  course_groups.course, course_groups.groupe
        FROM    course_groups
                    LEFT JOIN course_groups_teachers 
                        on course_groups.course = course_groups_teachers.course AND course_groups.groupe = course_groups_teachers.groupe
        WHERE   course_groups_teachers.course IS NULL AND course_groups_teachers.groupe IS NULL";

        $result = $pdo->query($requetes);
        $pdo = null;
        $this->assertSame($result->rowCount(), count(Model::getAllCoursesGroupsNotAttributed()));
    }

}
