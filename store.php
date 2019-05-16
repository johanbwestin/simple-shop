
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
  // $row = mysqli_fetch_assoc($allProducts);
?>
<html>
  <body>
  <div class="columns is-multiline">
    <?php 
      while ($row = mysqli_fetch_array($allProducts)) {
    ?>
    <div class="column is-4">
      <div class="card">
        <div class="card-image">
          <figure class="image is-4by3">
            <img src="<?php echo $row['pictureUrl'] ?>" alt="<?php echo $row['productName'] ?>">
          </figure>
        </div>
        <div class="card-content">
          <div class="media">
            <div class="media-content">
              <p class="title is-4"><?php echo $row['productName'] ?></p>
            </div>
          </div>
          <div class="content">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Phasellus nec iaculis mauris.
            <br>
            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
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
  </body>
</html>