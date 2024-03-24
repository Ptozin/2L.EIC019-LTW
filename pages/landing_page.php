<?php
  declare(strict_types = 1);

  session_start();

  require_once('database/connection.db.php');
  require_once('database/user.class.php');
  require_once('database/shoppingcart.class.php');
  require_once('templates/common.tpl.php');
  
  require_once('templates/landingpage.tpl.php');

  require_once('templates/profile.tpl.php');

  $db = getDatabaseConnection();

  if ($_SESSION['logedin']) {
    $Username = User::getUserName($db, $_SESSION['id']);
    $numOpenCarts =  ShoppingCart::numberOpenCartsUserId($db, $_SESSION['id']);
  }

  drawHeader($Username, $numOpenCarts);
  drawCover();
  drawAffiliatedRestaurants();
  drawPlatformBenefits();
  drawFooter();
?>