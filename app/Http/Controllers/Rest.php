<?php
namespace App\Http\Controllers;

use App\Http\Model\Model;
use Illuminate\Http\Request;
class Rest extends Controller {
 
    public function index() {
        return view('index');
    }

 
    function teachers()
    {
        $teachers = Model::getAllTeachers();    
        return view('teachers',array('listTeachers' => $teachers));
    }
    function version(){
        $version=Model::getVersion();
        return view('version',array('version'=>$version));
    }

    function courses() {
        $courses = Model::getAllCourses();
        return view('courses',compact('courses'));
    }
    function inscriptionProf(){
        $id=$_GET['id'];
        $nom=$_GET['nom'];
        $prenom=$_GET['prenom'];
        if(!empty($id) && !empty($nom) && !empty($prenom)){
            return Model::inscriptionProf($id,$nom,$prenom);
        }else{
            return "false";
        }
    }

    function addCourse(){
        $id=$_GET['id'];
        $name=$_GET['name'];
        $nbHours=$_GET['nbHours'];
        if(!empty($id) && !empty($name) && !empty($nbHours)){
            return Model::addCourse($id,$name,$nbHours);
        }else{
            return "false";
        }
    }
  
    function missions() {
        $missions = Model::getAllMissions();
        $cat=Model::getCategorie();
        $cat = array_unique($cat);
        return view('missions',compact('missions','cat'));
    }
    function addMission(){
        $title=$_GET['title'];
        $strCat=$_GET['strCat'];
        $nbHours=$_GET['nbHours'];
        if(!empty($title) && !empty($strCat) && !empty($nbHours)){
            return Model::addMission($title,$nbHours,$strCat);
        }else{
            return "false";
        }

    function groupes() {
        $listGroups = Model::getAllGroupes();
        return view('groupes',compact('listGroups'));
    }
    function deleteCourse($id){
        return Model::deleteCourse($id);
    }
    function deleteMission($id){
        return Model::deleteMission($id);
    }
    function deleteProf($id){
        return Model::deleteProf($id);
    }

    
}
?>
