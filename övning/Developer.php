<?php 

class Developer extends Employee{
  private $lang;
  
  public function __construct ($firstName, $surName, $age, $lang) {
    $this->lang = $lang;
    parent::__construct($firstName, $surName, $age);
  }

  public function getLang () {
    return $this->lang;
  }

  public function setLang ($lang) {
    $this->lang = $lang;
  }
}
?>