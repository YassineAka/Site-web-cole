<?php

namespace App\Http\Model;

use Illuminate\Http\Request;
use PDO;

class Model
{
    

    public static function connection(){
        //return new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        return new PDO("mysql:host=mysql-lescerveaux.alwaysdata.net;dbname=lescerveaux_poc;charset=utf8", "191765", "Cerveaux123", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }

    public static function getAllTeachers()
    {
        $pdo = Model::connection();
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
        $pdo = Model::connection();
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
     

     public static function getAllCoursesGroups() {
         $pdo = Model::connection();
        $requetes = "SELECT course_groups.course, course_groups.groupe
                     FROM course_groups ";
         $coursesGroups = $pdo->query($requetes);
         $tabCoursesGroups = array ();
         foreach ($coursesGroups as $row) {
              array_push($tabCoursesGroups,new CourseGroups($row["course"],$row["groupe"]));
             }
         $pdo = NULL;
         return $tabCoursesGroups;
     }
     

     public static function getAllCoursesGroupsTeachers() {
         $pdo = Model::connection();
        $requetes = "SELECT course_groups_teachers.course, course_groups_teachers.groupe, course_groups_teachers.teacher
                     FROM course_groups_teachers ";
         $coursesGroupsTeachers = $pdo->query($requetes);
         $tabCoursesGroupsTeachers = array ();
         foreach ($coursesGroupsTeachers as $row) {
              array_push($tabCoursesGroupsTeachers,new CourseGroupsTeachers($row["course"],$row["groupe"],$row["teacher"]));
             }
         $pdo = NULL;
         return $tabCoursesGroupsTeachers;
     }
     
     public static function getAllCoursesGroupsNotAttributed() {
        $pdo = Model::connection();
       $requetes = "SELECT  course_groups.course, course_groups.groupe
       FROM    course_groups
                   LEFT JOIN course_groups_teachers 
                       on course_groups.course = course_groups_teachers.course AND course_groups.groupe = course_groups_teachers.groupe
       WHERE   course_groups_teachers.course IS NULL AND course_groups_teachers.groupe IS NULL";
        $coursesGroups = $pdo->query($requetes);
        $tabCoursesGroups = array ();
        foreach ($coursesGroups as $row) {
             array_push($tabCoursesGroups,new CourseGroups($row["course"],$row["groupe"]));
            }
        $pdo = NULL;
        return $tabCoursesGroups;
    }

    public static function inscriptionProf($id,$nom,$prenom){
        $pdo = Model::connection();
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
    public static function addCourse($id,$name,$nbHours){  
        $pdo = Model::connection();                                                     
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

    public static function addAttributionsCourseToGroups($course,$groups){  
        $pdo = Model::connection();  
        $listGroups = explode("_",$groups);
        foreach($listGroups as $group){
            $requetes = "SELECT * FROM course_groups WHERE course like '$course' AND groupe like '$group' ";                                                                                                      
            $result = $pdo->query($requetes);                                                                                                                         
            if ($result->rowCount() < 1) {                                                                                                                            
                $addCoursToGroup = "INSERT INTO course_groups (`course`,`groupe`) VALUES ('$course','$group')";                                                                                
                $pdo->query($addCoursToGroup);                                                                                             
            }              
        }                                                                                                                                                                                                                                                                                                     
    }

    public static function addAttributionsCourseGroupToTeachers($course_group,$teachers){  
        $pdo = Model::connection();  
        $courseGroup = explode("_",$course_group);
        $lisTeachers = explode("_",$teachers);
        $course = $courseGroup[0];
        $group = $courseGroup[1];
        foreach($lisTeachers as $teacher){
            $requetes = "SELECT * FROM course_groups_teachers WHERE course like '$course' AND groupe like '$group'AND teacher like '$teacher' ";                                                                                                      
            $result = $pdo->query($requetes);                                                                                                                         
            if ($result->rowCount() < 1) {                                                                                                                            
                $addCoursGroupToteacher = "INSERT INTO course_groups_teachers (`course`,`groupe`,`teacher`) VALUES ('$course','$group','$teacher')";                                                                                
                $pdo->query($addCoursGroupToteacher);                                                                                             
            }              
        }                                                                                                                                                                                                                                                                                                     
    }
     
     public static function getAllMissions() {
        $pdo = Model::connection();
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
        $pdo = Model::connection();
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
        $pdo = Model::connection();
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
     public static function catJson() {
        
        $pdo = Model::connection();
        $requetes = "SELECT category.id FROM category";
        $cate = $pdo->query($requetes);
        $tabcat = array ();
        foreach ($cate as $row) {
            array_push($tabcat,new Categorie($row["id"]));
        }
        $pdo = NULL;
        return json_encode($tabcat);

    }

     public static function addCategory($title)                                                                                                                            
     {   
        $pdo = Model::connection();
        $requetes = "SELECT * FROM category WHERE id like '$title' ";                                                                                                      
        $result = $pdo->query($requetes);
        if ($result->rowCount() < 1) {                                                                                                                                                                                     
            $addCat = "INSERT INTO category (`id`) VALUES ('$title')";                                                                                
            $pdo->query($addCat); 
            $pdo = NULL;
            return "true";                                                                                                       
        }
        else{
            $pdo = NULL;
            return "false";
        }                                                                                                                                                           
     }
     

     public static function getCategorie() {
        $pdo = Model::connection();$requetes = "SELECT category.id FROM category";
        $cate = $pdo->query($requetes);
        $tabcat = array ();
        foreach ($cate as $row) {
            array_push($tabcat,new Categorie($row["id"]));
        }
        $pdo = NULL;
        return $tabcat;
     }

    public static function deleteCourse($id){
        $pdo = Model::connection();
        $requetes="DELETE FROM course WHERE id='$id'";
        $courses = $pdo->query($requetes);
        $pdo=null;
    }
    public static function showTeacher($id){
        $pdo = Model::connection();
        $requetes = "SELECT teacher.id, teacher.name,teacher.firstName
                     From teacher
                     where teacher.id='$id' ";        
        $result = $pdo->query($requetes);
        $ret = [];
        foreach ($result as $row) {
            array_push($ret, new Teacher ($row['id'], $row['name'], $row['firstName']));
        }
        $pdo = null;
        return $ret[0];
    }

    public static function deleteMission($id){
        $pdo = Model::connection();
        $requetes="DELETE FROM mission WHERE id='$id'";
        $mission = $pdo->query($requetes);
        $pdo=null;
    }


    public static function modifyMission($id,$title,$heure,$cat){
        $pdo = Model::connection();
        $requetes="UPDATE mission
                    SET title = '$title',
                    nbHours = '$heure',
                    cat = '$cat'
                    WHERE id = $id";
        $mission = $pdo->query($requetes);
        $pdo=null;
    }


    public static function deleteCat($id){
        $pdo = Model::connection();
        $requetesDeleteCat="DELETE FROM category WHERE id='$id'";
        $categorie = $pdo->query($requetesDeleteCat);
        $pdo=null;
    }
    public static function deleteProf($id){
        $pdo = Model::connection();
        $requetes="DELETE FROM teacher WHERE id='$id'";
        $prof = $pdo->query($requetes);
        $pdo=null;
    }

    

    public static function deleteGroup($id){
        $pdo = Model::connection();
        $requetes="DELETE FROM groupe WHERE id='$id'";
        $group = $pdo->query($requetes);
        $pdo=null;
    }

    

    public static function addGroup($id){   
        $pdo = Model::connection();                  
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
    
    public static function modificationProf($id,$id2,$nom,$prenom){
        $pdo = Model::connection();
        $sqlTeacher = "SELECT id FROM teacher WHERE id = '$id' ";
        $listTeacher=$pdo->query($sqlTeacher);

        if($listTeacher->rowCount() != 0){
            $requetes = "UPDATE teacher SET id = '$id2', name = '$nom', firstName = '$prenom' WHERE id = '$id' ";
            $pdo->query($requetes);
            $pdo = NULL;
            return "true";
        }
        else{
            $pdo = NULL;
            return "false";
        }
    }
    
    public static function modifyCourse($id,$id2,$name,$nbHours){  
        $pdo = Model::connection();                                                     
        $sqlCourse = "SELECT * FROM course WHERE id like '$id' ";                                                                                                      
        $listCourses = $pdo->query($sqlCourse);   
        if($listCourses->rowCount() != 0){                                                                
            $requetes="UPDATE course SET id = '$id2', title = '$name', nbHours = '$nbHours' WHERE id = '$id' ";
            $course = $pdo->query($requetes);
            $pdo=null;
            return "true";
        }
        else{
            $pdo = NULL;
            return "false";
        }
    }
    
    public static function modifyGroup($id,$id2){  
        $pdo = Model::connection();                                                     
        $sqlGroup = "SELECT * FROM groupe WHERE id like '$id' ";                                                                                                      
        $listGroups = $pdo->query($sqlGroup);   
        if($listGroups->rowCount() != 0){                                                                
            $requetes="UPDATE groupe SET id = '$id2' WHERE id = '$id' ";
            $groupe = $pdo->query($requetes);
            $pdo=null;
            return "true";
        }
        else{
            $pdo = NULL;
            return "false";
        }
    }

    public static function getMissionJson($id){
        $pdo = Model::connection();
        $requetes = "SELECT mission.id,mission.title, mission.nbHours,mission.cat FROM mission WHERE id='$id'";
        $cate = $pdo->query($requetes);
        $mission = array();
        foreach ($cate as $row) {
            array_push($mission,$row);
        }
        $pdo = NULL;
        return json_encode($row);
    }
    

    public static function getCourseJson($id){
        $pdo = Model::connection();
        $requetes = "SELECT course.id,course.title, course.nbHours FROM course WHERE id='$id'";
        $courses = $pdo->query($requetes);
        $course = array();
        foreach ($courses as $row) {
            array_push($course,$row);
        }
        $pdo = NULL;
        return json_encode($row);
    }
    

    public static function getGroupJson($id){
        $pdo = Model::connection();
        $requetes = "SELECT groupe.id FROM groupe WHERE id='$id'";
        $groupes = $pdo->query($requetes);
        $groupe = array();
        foreach ($groupes as $row) {
            array_push($groupe,$row);
        }
        $pdo = NULL;
        return json_encode($row);
    }
}
?>
