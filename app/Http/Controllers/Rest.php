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

    function courses() {
        $courses = Model::getAllCourses();
        return view('courses',compact('courses'));
    }
  
  

}
?>
