<?php
 
namespace App\Http\Model;
 
 
class Course 
{
  private $id;
  private $title;

  public function __construct($newId,$newTitle) {
      $this->id = $newId;
      $this->title = $newTitle;

  }
 
  public function __toString() {
      return "($this->id,$this->title)";
  }
 
  public function getId() {return $this->id;}
  public function getTitle() {return $this->title;}
     
}
 
?>
