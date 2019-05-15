
<?php 
  require("includes/header.php"); 
  $login = 0;
  $isSubmit = 0;
  if (isset($_POST['isLoggedOut']) && $_POST['isLoggedOut'] == 1) {
    logOut ();
  }
 	if(isset($_POST['issubmit']) && $_POST['issubmit'] == 1){
		$isSubmit = 1; // sätts till 1 om formulöret är skickat
    // // Här lägger man all kod
    $login = checkLogin($connection);
    if($login == true){
      header("Location: store.php");
    }
	}
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
</body>
<?php
  dbDisconnect($connection)

?>
</html>