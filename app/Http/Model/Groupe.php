<?php
 
namespace App\Http\Model;
 
 
class Groupe 
{
  private $id;

  public function __construct($id) {
      $this->id = $id;
      
  }

  public function __toString() {
      return "($this->id)";
  }
 
 
  public function getId() {return $this->id;}

}
 
?>
