
<?php 
  require("includes/header.php"); 
  $login = 0;
  $isSubmit = 0;
 	if(isset($_POST['issubmit']) && $_POST['issubmit'] == 1){
     echo "hej";
		$isSubmit = 1; // sätts till 1 om formulöret är skickat
    // // Här lägger man all kod
    $login = checkLogin($connection);
	}
	if($login){
		if ($login) {
      header("Location: store.php");
		} else {
			echo "Något gick fel";
		}
	} else {	
?>

<body>
<div class="login">
  <div class="container">
    <div class="column is-4 is-offset-4">
      <div class="box">
        <form action="login.php" method="post">
		      <input type="hidden" name="issubmit" value="1">

          <h2>Login</h2>
          <div class="field">
            Username:
            <div class="control has-icons-left">
              <input class="input is-medium" type="text" name="userName" placeholder="Username">
              <span class="icon is-small is-left">
                <i class="fa fa-user"></i>
              </span>
            </div>
          </div>
          <div class="field">
            Password:
            <div class="control has-icons-left">
              <input class="input is-medium" name="password" type="password" placeholder="Password">
              <span class="icon is-small is-left">
                <i class="fa fa-lock"></i>
              </span>
            </div>
          </div>
            <input class="button is-large is-fullwidth is-primary" type="submit" name="login" value="Login">
          </form>
      </div>
      <p class="has-text-centered loginoptions">
        <a href="../">Forgot Password</a> &nbsp;·&nbsp;
        <a href="register.php">Register Here</a>
      </p>
    </div>
  </div>
</div>
<!-- <div class="container has-text-centered">
  <form action="checklogin.php" method="post">
    <h1>Logga in</h1>
    <label>Användare (e-post):</label>
    <p><input type="email" name="txtUser"></p>
    <label>Lösenord:</label>
    <p><input type="password" name="txtPassword"></p>
    <p><input class="button is-primary" type="submit" name="submit" value="logga in"></p>
  </form>
</div> -->
</body>
<?php
  }
  dbDisconnect($connection)

?>
</html>