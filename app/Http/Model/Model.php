<?php

namespace App\Http\Model;

use Illuminate\Http\Request;
use PDO;

class Model
{
    

    public static function getAllTeachers()
    {
        //$pdo = new PDO("mysql:host=mysql-mohssine.alwaysdata.net;dbname=mohssine_test;charset=utf8", "mohssine", "catalan1070", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);        
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);        

        $requetes = "SELECT teacher.id, teacher.name,teacher.firstName
                     From Teacher ";        
        $result = $pdo->query($requetes);
        $ret = [];
        foreach ($result as $row) {
            array_push($ret, new Teacher ($row['id'], $row['name'],$row['firstName']));
        }
        $pdo = null;
        return $ret;
    }


}
