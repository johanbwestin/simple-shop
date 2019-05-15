<?php
function getProducts ($conn) {
  $query = "SELECT * FROM products";
  $result = mysqli_query($conn,$query) or die("Query failed: $query");

  return $result;
  // $row = mysqli_fetch_assoc($result);

  // $count = mysqli_num_rows($result);


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
      return true;
    } else {
      return false;
    }
}

  // if($checkUser == $user && $checkPass == $pass){
  //   $_SESSION['status'] = "ok";
  //   echo "<p>Du har loggat in, klicka på länken för att gå vidare!</p>";
  //   echo '<p><a href="store.php">gå till hem</a></p>';
  // } else{
  //   echo "<p>Du har inte fyllt i rätt användare och lösenord</p>";
  //   echo '<p><a href="index.php">Försök igen</a></p>';
  // }
}

/*
 * Skapar databaskopplingen
*/
function dbConnect(){
	$connection = mysqli_connect("localhost", "root", "", "system")
        or die("Could not connect");
    mysqli_select_db($connection,"system") or die("Could not select database");
	return $connection;
}
	
/*
* stänger databaskopplingen
*/
function dbDisconnect($connection){
	mysqli_close($connection);
}