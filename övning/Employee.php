<?php
class Employee {
  private $firstName;
  private $surName;
  private $age;
  
  public function __construct ($firstName, $surName, $age) {
    $this->firstName = $firstName;
    $this->surName   = $surName;
    $this->age       = $age; 
  }

  public function getFirstName () {
    return $this->firstName;
  }
  
  public function setFirstName () {
    $this->firstName = $firstName;
  }

  public function getSurName () {
    return $this->firstName;
  }
  
  public function setSurName () {
    $this->surName = $surName;
  }


  public function getAge () {
    return $this->age;
  }
  
  public function setAge () {
    $this->age = $age;
  }

}
?>