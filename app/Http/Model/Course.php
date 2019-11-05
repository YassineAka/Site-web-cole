<?php
 
namespace App\Http\Model;
 
 
class Course 
{
  private $id;
  private $title;
  private $nbHours;

  public function __construct($newId,$newTitle,$nbHours) {
      $this->id = $newId;
      $this->title = $newTitle;
      $this->nbHours = $nbHours;

  }
 
  public function __toString() {
      return "($this->id,$this->title)";
  }
 
  public function getId() {return $this->id;}
  public function getTitle() {return $this->title;}
  public function getNbHours() {return $this->nbHours;}
     
}
 
?>
