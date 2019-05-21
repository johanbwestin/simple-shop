<?php
  session_start();?>
<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Simple Shop</title>
  <link rel="stylesheet" href="style/bulma-0.7.4/css/bulma.min.css">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  <link rel="stylesheet" href="style/main.css">
</head>
<?php 
    require("includes/nav.php"); 
    require("includes/functions.php");
    require 'Products.php';
    require 'Footwear.php';
    
    $connection = dbConnect();
    countItem ($connection);
    ?>
<html>
  <body>
  <div class="allButFooter">