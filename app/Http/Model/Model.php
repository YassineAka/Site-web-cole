<?php

namespace App\Http\Model;

use Illuminate\Http\Request;
use PDO;

class Model
{
    

    public static function getAllTeachers()
    {
       //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);        
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
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);        
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $requetes = "SELECT course.id, course.title, course.nbHours
                    FROM course ";
        $cours = $pdo->query($requetes);
        $tabcours = array ();
        foreach ($cours as $row) {
             array_push($tabcours,new Course($row["id"],$row["title"],$row["nbHours"]));
            }
        $pdo = NULL;
        return $tabcours;
     }
    public static function inscriptionProf($id,$nom,$prenom){
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);   
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);  
        $sqlTeacher = "SELECT id FROM teacher WHERE id = '$id' ";
        $listTeacher=$pdo->query($sqlTeacher);

        if($listTeacher->rowCount() == 0){
            $requetes = " INSERT INTO teacher VALUES ('$id','$nom','$prenom') ";
            $pdo->query($requetes);
            $pdo = NULL;
            return "true";
        }
        else{
            $pdo = NULL;
            return "false";
        }
    }
     public static function addCourse($id,$name,$nbHours)                                                                                                                            
     {                                                                                                                                                                 
             $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);                                                                                                                                                         
             $requetes = "SELECT * FROM course WHERE id like '$id' ";                                                                                                      
             $result = $pdo->query($requetes);                                                                                                                         
             if ($result->rowCount() < 1) {                                                                                                                            
                 $addCours = "INSERT INTO course (`id`,`title`,`nbHours`) VALUES ('$id','$name','$nbHours')";                                                                                
                 $pdo->query($addCours);
                 $pdo = NULL;
                 return "true";                                                                                                
                                                                                                                                      
             }
             else{
                 $pdo = NULL;
                 return "false";
             }                                                                                                                                            
                                                                                                                                                                    
     }
     
     public static function getAllMissions() {
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);   
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);        
        $requetes = "SELECT mission.id,mission.title, mission.nbHours,mission.cat
                  FROM mission";
    
        $mission = $pdo->query($requetes);
        $tabmissions = array ();
        foreach ($mission as $row) {
             array_push($tabmissions,new Mission($row["id"],$row["title"],$row["nbHours"],$row["cat"]));
               }
        $pdo = NULL;
        return $tabmissions;
     }

     public static function getAllGroupes() {
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);        
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $requetes = "SELECT groupe.id FROM groupe ";
        $groupes = $pdo->query($requetes);
        $tabgroupes = array ();
        foreach ($groupes as $row) {
             array_push($tabgroupes,new Groupe($row["id"]));
            }
        $pdo = NULL;
        return $tabgroupes;
     }

     public static function addMission($title,$nbHours,$cat)                                                                                                                            
     {                     
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);   
                                                                                                                                            
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);                                                                                                                                                         
        $requetes = "SELECT * FROM mission WHERE title like '$title' ";                                                                                                      
        $result = $pdo->query($requetes);
        if ($result->rowCount() < 1) {                                                                                                                                                                                     
            $addMission = "INSERT INTO mission (`title`,`nbHours`,`cat`) VALUES ('$title','$nbHours','$cat')";                                                                                
            $pdo->query($addMission); 
            $pdo = NULL;
            return "true";                                                                                                       
        }
        else{
            $pdo = NULL;
            return "false";
        }                                                                                                                                                           
     }

     public static function getCategorie() {
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);   
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);        
        $requetes = "SELECT mission.cat
        FROM mission";

        $cate = $pdo->query($requetes);
        $tabcat = array ();
        foreach ($cate as $row) {
            array_push($tabcat,new Categorie($row["cat"]));
        }
        $pdo = NULL;
        return $tabcat;
     }

     public static function deleteCourse($id){
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);   
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);        
        $requetes="DELETE FROM course WHERE id='$id'";
        $courses = $pdo->query($requetes);
        $pdo=null;
    }

    public static function deleteMission($id){
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);   
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);        
        $requetes="DELETE FROM mission WHERE id='$id'";
        $courses = $pdo->query($requetes);
        $pdo=null;
    }
    public static function deleteProf($id){
        //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);   
        $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);        
        $requetes="DELETE FROM teacher WHERE id='$id'";
        $courses = $pdo->query($requetes);
        $pdo=null;
    }

    

    public static function addGroup($id)                                                                                                                            
    {                     
       //$pdo = new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);                                                                                                                                     
       $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);                                                                                                                                                                                                                                                  
                                                                                                                                                             
        $requetes = "SELECT * FROM groupe WHERE id like '$id' ";                                                                                                      
        $result = $pdo->query($requetes);
        if ($result->rowCount() < 1) {                                                                                                                                                                                                                                                                                                                            
            $addGroup = "INSERT INTO groupe (`id`) VALUES ('$id')";                                                                                                                                      
            $pdo->query($addGroup); 
            $pdo = NULL;
            return "true";                                                                                                       
        }
        else{
            $pdo = NULL;
            return "false";
        } 
                                                                                                                                                                   
    }

}
?>
