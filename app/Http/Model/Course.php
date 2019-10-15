<?php
 
namespace App\Http\Model;
 
use Illuminate\Database\Eloquent\Model;
 
class Course extends Model
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
