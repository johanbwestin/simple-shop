<?php
class Products {
  private $brandName;
  private $model;
  private $description;
  private $price;

  
  
  public function __construct ($brandName, $model, $description, $price) {
    $this->brandName    = $brandName;
    $this->model        = $model;
    $this->description  = $description;
    $this->price        = $price;
  }

  public function getBrandName () {
    return $this->brandName;
  }
  
  public function setBrandName () {
    $this->brandName = $brandName;
  }
  
  public function getModel () {
    return $this->model;
  }
  
  public function setModel () {
    $this->model = $model;
  }
  
  public function getDescription () {
    return $this->description;
  }
  
  public function setDescription () {
    $this->description = $description;
  }

  public function getPrice () {
    return $this->price;
  }
  
  public function setPrice () {
    $this->price = $price;
  }
  
}
?>