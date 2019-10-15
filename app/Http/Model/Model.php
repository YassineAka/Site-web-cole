<?php

namespace App\Http\Model;

use Illuminate\Http\Request;
use PDO;

class Model
{
    

    public static function getAllTeachers()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);        

        $requetes = "SELECT teacher.id, teacher.name,teacher.firstName
                     From teacher ";        
        $result = $pdo->query($requetes);
        $ret = [];
        foreach ($result as $row) {
            array_push($ret, new Teacher ($row['id'], $row['name'], $row['firstName']));
        }
        $pdo = null;
        return $ret;
    }

    public static function getAllCourses() {
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);        
        $requetes = "SELECT course.id, course.title
                    FROM course ";
        $cours = $pdo->query($requetes);
        $tabcours = array ();
        foreach ($cours as $row) {
             array_push($tabcours,new Course($row["id"],$row["title"]));
            }
        $pdo = NULL;
        return $tabcours;
     }
      
     


}
?>
