<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use PDO;
use PDOStatment;
use App\Http\Model\Model;

class TestModelCourse extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCourseExist()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
        $requetes = "SELECT course.id, course.title
        FROM course ";
        $result = $pdo->query($requetes);
        $pdo = NULL;
        $this->assertSame($result->rowCount(),count(Model::getAllCourses()));
    }
}
