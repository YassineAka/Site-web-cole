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
        return Model::inscriptionProf($id,$nom,$prenom);
    }
  

}
?>
