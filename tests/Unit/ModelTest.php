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

}
