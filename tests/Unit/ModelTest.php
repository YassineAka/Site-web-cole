<?php
namespace Tests\Unit;
use App\Http\Model\Model;
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
     * @return void
     */
    public function testGetAllTeachers()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
        $requetes = "SELECT teacher.id, teacher.name,teacher.firstName
                     From teacher ";        
        $result = $pdo->query($requetes);
        $pdo = null;
        $this->assertSame($result->rowCount(),count(Model::getAllTeachers()));
    }
    public function testAddTeacher(){
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
        $requetes = "SELECT teacher.id, teacher.name,teacher.firstName
                     From teacher ";        
        $result = $pdo->query($requetes);
        $pdo = null;
        $id="lol";
        $nom="rsp";
        $prenom="tkt";
        Model::inscriptionProf($id,$nom,$prenom);
        $this->assertSame($result->rowCount()+1,count(Model::getAllTeachers()));
        
    }
    public function testAddStuddent()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
        $id="Test";
        $name="developpement"; //IdStudentTest 
        $removeIdStudent="DELETE FROM course WHERE id='$id' AND title='$name'";
        Model::add($id,$name);
        $requete="SELECT * FROM course WHERE id='$id' AND title='$name'";
        $result = $pdo->query($requete);
        $verif = $result->rowCount();
        $pdo->query($removeIdStudent);
        $pdo = null;
        $this->assertTrue($verif==1);

    }



    public function testGetAllMissions()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);        
        $requetes = "SELECT mission.title, mission.nbHours,mission.cat
                  FROM mission";
           
        $result = $pdo->query($requetes);
        $pdo = null;
        $this->assertSame($result->rowCount(),count(Model::getAllMissions()));
    }
    public function testGetCategorie()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);        
        $requetes = "SELECT mission.cat
        FROM mission";

        $result = $pdo->query($requetes);
        $pdo = null;
        $this->assertSame($result->rowCount(),count(Model::getCategorie()));
    }
}
