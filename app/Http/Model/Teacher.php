<?php
namespace App\Http\Model;
class Teacher{
    public $id;
    public $name;
    public $fisrtName;

    public function __construct($id,$name,$fisrtName)
    {
            $this->id = $id;
            $this->name = $name;
            $this->fisrtName = $fisrtName;
    }
}

?>
