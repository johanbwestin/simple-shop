<?php 

class Footwear extends Products{
  private $material;
  
  public function __construct ($brandName, $model, $description, $price, $material) {
    $this->material = $material;
    parent::__construct($brandName, $model, $description, $price);
  }

  public function getMaterial () {
    return $this->material;
  }

  public function setMaterial ($material) {
    $this->material = $material;
  }
}
?>