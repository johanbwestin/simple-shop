
<?php 
  require("includes/header.php");
  // Kontrollerar Adminbehörighet
if(!isset($_SESSION['status'])){
	header("Location: login.php");
	exit;
}

if(isset($_POST['productId']) && $_POST['productId'] > 0){
  addToCart($connection, $_POST['productId'], $_POST['quantity']);
  countItem ($connection);
  header("Refresh:0");
}

$allProducts = getProducts($connection); 
?>
  <div class="columns is-multiline">
    <?php 
      while ($row = mysqli_fetch_array($allProducts)) {
        $Footwear = new Footwear($row['productBrand'], $row['productModel'], $row['productDescription'], $row['productPrice'], $row['productMaterial']);        
    ?>
    <div class="column is-4">
      <div class="card">
        <div class="card-image">
          <figure class="image is-4by3">
            <img src="<?php echo $row['pictureUrl'] ?>" alt="<?php echo $Footwear->getBrandName(); ?>">
          </figure>
        </div>
        <div class="card-content">
          <div class="media">
            <div class="">
              <div id="cartTitle" class="title is-4"><?php echo $Footwear->getBrandName(); ?></div>
              <p class="title is-5"><?php echo $Footwear->getModel();  ?></p>
            </div>
          </div>
          <div class="content">
            <strong>Material: </strong><?php echo $Footwear->getMaterial() . "."; ?> <br>
            <strong>Description: </strong><?php echo $Footwear->getDescription(); ?>
            <br>
            <div><strong>Price:</strong> <?php echo $Footwear->getPrice() . "$"; ?></div>
            <form action="store.php" class="button-box" method="post">
              <input type="hidden" name="productId" value="<?php echo $row['productId'] ?>">            
              <input class="button is-primary" type="submit" name="addToCart" value="Add To Cart">
              <input class="input quantity" name="quantity" type="number" value="1">
            </form>
          </div>
        </div>
      </div>
    </div>
<?php
  }
  ?>
  </div>
  <?php
        require('includes/footer.php')
  ?>