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
    echo "hej" . $_POST['changeQuantity'] ;
    changeQuantity ($connection, $_POST['changeQuantity'], $_POST['productId'] );
  }
  
?>
<div class="container">
  <div class="hero has-text-centered">
    <h2 class="title">Cart</h2>
  </div>
    <?php
  while ($row = mysqli_fetch_array($order)) {
    // $countItems = countItem($row['quantity']);
    countItem($connection)
    ?>

<div class="field">
  <div class="container is-fluid">
  <div class="notification columns">
    <div class="column">
    <strong>Item</strong>: <?php echo $row['productName']?>
    </div>
    <form class="column" action="cart.php" method="post">
      <strong>Quantity</strong>: 
      <input type="hidden" name="productId" value="<?php echo $row['productId']?>">
      <input class="input   quantity" type="number" name="changeQuantity" value="<?php echo $row['quantity'] ?>"><?php //echo $row['quantity'] //countItem($connection, $row['productId'])?>
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

  // $_SESSION['orderCount'] = $countItems;
  ?>
    <div class="columns completeOrder">
      <a class="button is-primary" href="store.php">Back To Store</a>
      <input class="button is-primary" name="completeOrder" type="submit" value="Complete Order">
    </div>
</div>