<?php
namespace Tests\Unit;
use App\Http\Model\Model;
use App\Http\Model\Mission;
use PDO;
use PDOStatement;
use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class ModelTest extends TestCase
{
    /**
     * A basic test example.
     * 
     *
     * @return void
     */
    public function testGetAllTeachers()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);    

        $requetes = "SELECT teacher.id, teacher.name,teacher.firstName
                     From teacher ";        
        $result = $pdo->query($requetes);
        $pdo = null;
        $this->assertSame($result->rowCount(),count(Model::getAllTeachers()));
    }
    public function testAddTeacher(){
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);    

        $requetes = "SELECT teacher.id, teacher.name,teacher.firstName
                     From teacher ";        
        $result = $pdo->query($requetes);
        $pdo = null;
        $id="pop";
        
        $nom="rsp";
        $prenom="tkt";
        Model::deleteProf($id);
        Model::inscriptionProf($id,$nom,$prenom);
        $this->assertSame($result->rowCount(),count(Model::getAllTeachers()));
        
    }

    public function testAddCourse()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
        $id="Test";
        $name="developpement"; 
        $nbHours= 45;
        $removeIdCours="DELETE FROM course WHERE id='$id' AND title='$name' AND nbHours ='$nbHours'";
        Model::addCourse($id,$name,$nbHours);
        $requete="SELECT * FROM course WHERE id='$id' AND title='$name' AND nbHours ='$nbHours'";
        $result = $pdo->query($requete);
        $verif = $result->rowCount();
        $pdo->query($removeIdCours);
        $pdo = null;
        $this->assertTrue($verif==1);

    }

    public function testAddGroup()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
        $id="Test";
        $removeIdGroup="DELETE FROM groupe WHERE id='$id'";
        Model::addGroup($id);
        $requete="SELECT * FROM groupe WHERE id='$id'";
        $result = $pdo->query($requete);
        $verif = $result->rowCount();
        $pdo->query($removeIdGroup);
        $pdo = null;
        $this->assertTrue($verif==1);

    }
    public function testGetAllMissions()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);        
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);    

        $requetes = "SELECT mission.title, mission.nbHours,mission.cat
                  FROM mission";
           
        $result = $pdo->query($requetes);
        $pdo = null;
        $this->assertSame($result->rowCount(),count(Model::getAllMissions()));
    }


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAllGroups()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
        $requetes = "SELECT groupe.id FROM groupe ";
        $result = $pdo->query($requetes);
        $pdo = NULL;
        $this->assertSame($result->rowCount(),count(Model::getAllGroupes()));
    }


    public function testGetCategorie()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);        
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);    

        $requetes = "SELECT mission.cat
        FROM mission";

        $result = $pdo->query($requetes);
        $pdo = null;
        $this->assertSame($result->rowCount(),count(Model::getCategorie()));
    }

    public function testAddMission()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);    

        $title="Test";
        $nbHours="10";
        $cat="Inscription";
        $removeIdMission="DELETE FROM mission WHERE title='$title' AND nbHours='$nbHours' AND cat='$cat'";
        Model::addMission($title,$nbHours,$cat);
        $requete="SELECT * FROM mission WHERE title='$title' AND nbHours='$nbHours' AND cat='$cat'";
        $result = $pdo->query($requete);
        $verif = $result->rowCount();
        $pdo->query($removeIdMission);
        $pdo = null;
        $this->assertTrue($verif==1);

    }

  
    public function testDeleteCourse()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
        $id="Test";
        $name="salut";
        $addCourse="INSERT INTO course (`id`,`title`) VALUES ('$id','$name')";
        $pdo->query($addCourse);
        Model::deleteCourse($id);
        $requete="SELECT * FROM course WHERE id='$id'";
        $result = $pdo->query($requete);
        $pdo = null;
        $this->assertTrue($result->rowCount()==0);

    }
    

    public function testDelMission()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
        $title="salut";
        $nbHours="3";
        $cat = "Stage";
        $addMission = "INSERT INTO mission (`title`,`nbHours`,`cat`) VALUES ('$title','$nbHours','$cat')";
        $resultQ = $pdo->query($addMission);
        $this->assertTrue($resultQ->rowCount()<=1);

        $idMission = "SELECT * FROM mission WHERE title='$title'";
        $idResult = $pdo->query($idMission);
        $row = $idResult->fetch(); 
        Model::deleteMission($row['id']);

        $idMission = $row['id'];
        $requete="SELECT * FROM mission WHERE id= $idMission ";
        $result = $pdo->query($requete);
        
        $pdo = null;
        $this->assertTrue($result->rowCount()==0);

    }

    
    public function testDeleteTeacher()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
        $id="15";
        $nom="rsp";
        $prenom="tkt";
        $addTeacher = " INSERT INTO teacher VALUES ('$id','$nom','$prenom') ";
        $resultQ = $pdo->query($addTeacher);
        Model::deleteProf($id);
        $this->assertTrue($resultQ->rowCount()<=1);
        $requete="SELECT * FROM teacher WHERE id='$id'";
        $result = $pdo->query($requete);
        $pdo = null;
        $this->assertTrue($result->rowCount()==0);

    }

    
    public function testDeleteGroup()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
        $id="A000";
        $addGroup = " INSERT INTO groupe VALUES ('$id') ";
        $resultQ = $pdo->query($addGroup);
        Model::deleteGroup($id);
        $this->assertTrue($resultQ->rowCount()<=1);
        $requete="SELECT * FROM groupe WHERE id='$id'";
        $result = $pdo->query($requete);
        $pdo = null;
        $this->assertTrue($result->rowCount()==0);

    }

    

    public function testCourseExist()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
        $requetes = "SELECT course.id, course.title, course.nbHours FROM course ";
        $result = $pdo->query($requetes);
        $pdo = NULL;
        $this->assertSame($result->rowCount(),count(Model::getAllCourses()));
    }
    public function testAddCat()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);    

        $title="Testosterone";
        $removeIdCat="DELETE FROM category WHERE id='$title'";
        Model::addCat($title);
        $requete="SELECT * FROM category WHERE id='$title'";
        $result = $pdo->query($requete);
        $verif = $result->rowCount();
        $pdo->query($removeIdCat);
        $pdo = null;
        $this->assertTrue($verif==1);

    }



}
