

<?php 
  require("includes/header.php"); 
  $isRegister = 0;
  $isSubmit = 0;
	if(isset($_POST['issubmit']) && $_POST['issubmit'] == 1){
		$isSubmit = 1; // sätts till 1 om formulöret är skickat
    // // Här lägger man all kod
    $isRegister = register ($connection);
	}
	if($isRegister > 0){
		if ($isRegister) {
      header("Location: login.php");
		} else {
			echo "Något gick fel";
		}
	} else {	
	?>
<body>
<div class="register">
  <div class="container">
    <div class="column is-4 is-offset-4">
      <div class="box">
        <form action="register.php" method="post">
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
          <div class="field">
            E-mail:
            <div class="control has-icons-left">
              <input class="input is-medium" name="email" type="email" placeholder="E-mail">
              <span class="icon is-small is-left">
                <i class="fa fa-lock"></i>
              </span>
            </div>
          </div>
          <div class="field">
            First Name:
            <div class="control has-icons-left">
              <input class="input is-medium" name="firstName" type="text" placeholder="First Name">
              <span class="icon is-small is-left">
                <i class="fa fa-lock"></i>
              </span>
            </div>
          </div>
          <div class="field">
            Last Name:
            <div class="control has-icons-left">
              <input class="input is-medium" name="lastName" type="text" placeholder="Last Name">
              <span class="icon is-small is-left">
                <i class="fa fa-lock"></i>
              </span>
            </div>
          </div>
          <input class="button is-large is-fullwidth is-primary" type="submit" name="register" value="Register">
          </form>
      </div>
      <p class="has-text-centered loginoptions">
        <a href="../">Forgot Password</a> &nbsp;·&nbsp;
        <a href="login.php">Login Here</a>
      </p>
    </div>
  </div>
</div>
</body>
<?php
  }
  dbDisconnect($connection)
?>
</html>