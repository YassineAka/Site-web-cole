<?php
 
namespace App\Http\Model;
 
 
class CourseGroupsTeachers
{
  private $course;
  private $groupe;
  private $teacher;

  public function __construct($newCourse,$newGroupe,$newTeacher) {
      $this->course = $newCourse;
      $this->groupe = $newGroupe;
      $this->teacher = $newTeacher;

  }
 
  public function __toString() {
      return "($this->course,$this->groupe,$this->teacher)";
  }
 
  public function getCourse() {return $this->course;}
  public function getGroupe() {return $this->groupe;}
  public function getTeacher() {return $this->teacher;}
     
}
 
?>
