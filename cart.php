<?php 
  require("includes/header.php");
  $countItems = 0;
  if (isset($_SESSION['status'])){
    $order = getOrder($connection);
    $count = mysqli_num_rows($order);
  }

  if (isset($_POST['isDeleted']) && $_POST['isDeleted'] > 0){
    deleteItem ($connection, $_POST['productId']);
    header("Refresh:0");
  }

  if (isset($_POST['productId']) && $_POST['productId'] > 0 && !isset($_POST['isDeleted'])) {
    changeQuantity ($connection, $_POST['changeQuantity'], $_POST['productId'] );
  }
  
?>
<div class="container">
  <div class="title has-text-centered">
    <h2 class="title">Cart</h2>
  </div>
    <?php
  while ($row = mysqli_fetch_array($order)) {
    $Footwear = new Footwear($row['productBrand'], $row['productModel'], $row['productDescription'], $row['productPrice'], $row['productMaterial']);        

    countItem($connection);
    ?>
  <div class="field">
    <div class="container is-fluid">
    <div class="notification columns">
      <div class="column headerBox">
        <strong>Item</strong>: <?php echo $Footwear->getBrandName() . " " . $Footwear->getModel();?>
      </div>
      <form class="column" action="cart.php" method="post">
        <strong>Quantity</strong>: 
        <input type="hidden" name="productId" value="<?php echo $row['productId']?>">
        <input class="input   quantity" type="number" name="changeQuantity" value="<?php echo $row['quantity'] ?>">
        <input class="button is-primary" type="submit" value="Change">
      </form>
      <form action="cart.php" method="post">
        <input type="hidden" name="productId" value="<?php echo $row['productId']?>">
        <input type="hidden" name="isDeleted" value="1">
        <button class="button is-small" type="submit">
          <i class="fa fa-trash" aria-hidden="true"></i>
        </button>
      </form>
    </div>
  </div>
</div>
<?php 
  }
  ?>
  <div class="columns completeOrder">
    <a class="button is-primary" href="store.php">Back To Store</a>
    <input class="button is-primary" name="completeOrder" type="submit" value="Complete Order">
  </div>
</div>
<?php
    require('includes/footer.php')
?>