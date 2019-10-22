<?php
 
namespace App\Http\Model;
 
 
class Categorie 
{
 
  private $cat;
  

  public function __construct($cat) {

      $this->cat = $cat;
  }

  public function __toString() {
      return "($this->cat)";
  }
  
  public function getCat() {return $this->cat;}

}
 
?>
