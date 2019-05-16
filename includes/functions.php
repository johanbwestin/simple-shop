<?php
function deleteItem ($conn, $productId) {
  $userId = $_SESSION['userid'];
  $query = "DELETE FROM cart WHERE userId= $userId AND productId= $productId";

  $result = mysqli_query($conn,$query) or die("Query failed: $query");
}

function addToCart ($conn, $productId, $quantity) {
  $userId = $_SESSION['userid'];
  $query = "INSERT INTO cart
  (userId,productId,quantity)
  VALUES($userId,$productId,$quantity)";

  $result = mysqli_query($conn,$query) or die("Query failed: $query");
}

function countItem ($conn) {
  $countItems = 0;
  $_SESSION['orderCount'] = $countItems;
  $order = getOrder($conn);
  if (isset($_SESSION['status'])){

    while ($row = mysqli_fetch_array($order)) {
      $countItems += $row['quantity'];
      $_SESSION['orderCount'] = $countItems;
      // return $countItems;
    }
  }
  // header("Refresh:0");
  // $query = "SELECT COUNT(*) AS cartCount FROM cart
  // WHERE cart.productId=".$productId;

  // $result = mysqli_query($conn,$query) or die("Query failed: $query");
  
  // $row = mysqli_fetch_assoc($result);
  // echo "Test" . $row['cartCount'];
  // return $row['cartCount'];
}

function changeQuantity ($conn, $quantity, $productId) {
  echo "test" . $productId . $quantity;
  $userId = $_SESSION['userid'];
  
    $query = "UPDATE cart
			SET quantity='$quantity'
      WHERE userId=$userId AND productId=$productId";
      
      echo "SQL" . $query;

    $result = mysqli_query($conn,$query) or die("Query failed: $query");
}


function getOrder ($conn) {
  if (isset($_SESSION['status'])) {
    $userId = $_SESSION['userid'];

    
    $query = "SELECT * FROM users 
  INNER JOIN cart ON users.userId = cart.userId
  INNER JOIN products ON products.productId = cart.productId
  WHERE users.userId = $userId";

$result = mysqli_query($conn,$query) or die("Query failed: $query");

return $result;
}
}

function getProducts ($conn) {
  $query = "SELECT * FROM products";
  $result = mysqli_query($conn,$query) or die("Query failed: $query");

  return $result;
}

function register ($conn) {
  $userName = $_POST['userName'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];

  $passwordHash = encryptPassword ($password);

  $query = "INSERT INTO users
  (userName,password,email,firstName,lastName)
  VALUES('$userName','$passwordHash','$email','$firstName','$lastName')";

  $result = mysqli_query($conn,$query) or die("Query failed: $query");

  $insId = mysqli_insert_id($conn);

return $insId;
}

function encryptPassword ($password) {
  return password_hash ($password , PASSWORD_DEFAULT); 
}

function verifyPassword ($password, $hashedPassword) {
  return password_verify ($password , $hashedPassword);
}

function logOut () {
  // Nollställer sessionsvariabeln
  unset($_SESSION['status']);

// Återställer hela sessionen och tömmer innehållet i alla sessionsvariabler
  session_destroy();
}

function checkLogin ($conn) {
  $userName = mysqli_real_escape_string($conn,$_POST['userName']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);

  $query = "SELECT * FROM users
    WHERE userName = '$userName'";
  $result = mysqli_query($conn,$query) or die("Query failed: $query");

  $row = mysqli_fetch_assoc($result);

  $count = mysqli_num_rows($result);

  if($count == 1) {
    // Kontrollerar lösenordet, använder password_hash för att kontrollera hash mot databasen
    if (password_verify($password, $row["password"])) {
      $_SESSION['status'] = "ok";
      $_SESSION['userid'] = $row["userId"];
      return true;
    } else {
      return false;
    }
  }
}

/*
 * Skapar databaskopplingen
*/
function dbConnect(){
	$connection = mysqli_connect("localhost", "root", "", "shop")
        or die("Could not connect");
    mysqli_select_db($connection,"shop") or die("Could not select database");
	return $connection;
}
	
/*
* stänger databaskopplingen
*/
function dbDisconnect($connection){
	mysqli_close($connection);
}