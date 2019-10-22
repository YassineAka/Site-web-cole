<?php

namespace App\Http\Model;

use Illuminate\Http\Request;
use PDO;

class Model
{
    

    public static function getAllTeachers()
    {
        //$pdo = new PDO("mysql:host=mysql-mohssine.alwaysdata.net;dbname=mohssine_test;charset=utf8", "mohssine", "catalan1070", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);        
       // $pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);        
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
    /**
     * this function give you the date of the last commit.
     */
    public static function getVersion(){
        $result = shell_exec("git log -1");
        $result2=shell_exec('git rev-parse HEAD');
        $author=shell_exec("git log -1 --pretty=format:'%an'");
        $date=shell_exec("git log -1 --format=%cd --date=local");
        $comment=shell_exec("git log --format=%B -n 1");

        $ret = array($result,$result2,$author,$date,$comment);
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
     public static function add( $id,$name)                                                                                                                            
     {                                                                                                                                                                 
             $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);                                                                                                                                                         
             $requetes = "SELECT * FROM course WHERE id like '$id' ";                                                                                                      
             $result = $pdo->query($requetes);                                                                                                                         
             if ($result->rowCount() < 1) {                                                                                                                            
                 $addSudent = "INSERT INTO course (`id`,`title`) VALUES ('$id','$name')";                                                                                
                 $pdo->query($addSudent);                                                                                                                              
                 return "Successful Addition!";                                                                                                                        
             } else {                                                                                                                                                  
                 return "The matricule is already assigned";                                                                                                           
             }                                                                                                                                                         
                                                                                                                                                                       
             $pdo = null;                                                                                                                                              
                                                                                                                                                                    
     }
     


}
?>
