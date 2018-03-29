<?php
  require("../classes/user.php");
  $users = new User;
  if(isset($_GET['load'])){
    $users->viewUsers();
  }

  if(isset($_GET['admin'])){
    $users->adminStatus($_GET['admin']);
  }

  if(isset($_GET['remove'])){
    $users->removeUser($_GET['remove']);
  }
?>
