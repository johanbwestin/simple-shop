
<?php 
  require("includes/header.php");


  // Kontrollerar Adminbehörighet
if(!isset($_SESSION['status'])){
	header("Location: login.php");
	exit;
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
            <div class="button-box">
              <a class="button is-primary" href="#">Add To Cart</a>
            </div>
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