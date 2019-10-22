<?php
 
namespace App\Http\Model;
 
 
class Mission 
{
  private $title;
  private $nbHours;
  private $cat;
  

  public function __construct($title,$nbHours,$cat) {
      $this->title = $title;
      $this->nbHours = $nbHours;
      $this->cat = $cat;
  }
 
  public function __toString() {
      return "($this->title,$this->nbHours,$this->cat)";
  }
 
  public function getTitle() {return $this->title;}
  public function getNbHours() {return $this->nbHours;}
  public function getCat() {return $this->cat;}

}
 
?>
