<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="index.php">
      <img src="https://cdn.discordapp.com/attachments/443818380659654677/578274482309955585/shoe.png" width="70" height="28">
    </a>
    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>
<div class="navbar-menu">
    <div class="navbar-start">
      <a href="index.php" class="navbar-item">
        Home
      </a>
      <a href="store.php" class="navbar-item">
        Shop
      </a>
    </div>
    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <?php if(isset($_SESSION['status'])) {?>
          <div class="cart">
          <a href="cart.php">
            <?php echo $_SESSION['orderCount']?><i class="fas fa-shopping-cart"></i>
          </a>
          </div>
          <?php }?>
          <a class="button is-primary" href="register.php">
            <span class="icon is-small is-left">
            <i class="fas fa-user-plus"></i>
            </span>
            <strong>Sign up</strong>
          </a>
          <form action="login.php" method="post">
		        <input type="hidden" name="isLoggedOut" value="1">            
            <input class="button is-light" type="submit" name="logOut" value="Log Out">
          </form>
        </div>
      </div>
    </div>
  </div>
</nav>
