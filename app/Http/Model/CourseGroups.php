<?php
 
namespace App\Http\Model;
 
 
class CourseGroups 
{
  private $course;
  private $groupe;

  public function __construct($newCourse,$newGroupe) {
      $this->course = $newCourse;
      $this->groupe = $newGroupe;

  }
 
  public function __toString() {
      return "($this->course,$this->groupe)";
  }
 
  public function getCourse() {return $this->course;}
  public function getGroupe() {return $this->groupe;}
     
}
 
?>
