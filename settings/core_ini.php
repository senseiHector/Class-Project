<?php
  session_start();
  
  function isLoggedIn(){

    if(isset($_SESSION['firstname']) && isset($_SESSION['lastname'])){
      if($_SESSION['per']==2){
        require_once("../layout/standardheader.php");
      }
      else{
        require_once("../layout/adminheader.php");
      }
    }
    else
      header("Location: ../login/index.php?ses=1");
  }

?>
