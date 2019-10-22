<?php
namespace App\Http\Model;


class Teacher {
    public $id;
    public $name;
    public $firstName;

    public function __construct($id,$name,$firstName)
    {
            $this->id = $id;
            $this->name = $name;
            $this->firstName = $firstName;
    }
}

?>
