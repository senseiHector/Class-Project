<?php
  require("../classes/major.php");
  $majors = new Major;
  if(isset($_GET['load'])){
    $majors->viewMajors();
  }
  elseif(isset($_GET['insert'])) {
    $majors->insertMajor($_GET['insert']);
  }
  elseif(isset($_GET['delete'])) {
    $majors->deleteMajor($_GET['delete']);
  }
  elseif(isset($_GET['getedit'])) {
    $majors->getEdit($_GET['getedit']);
  }
  elseif(isset($_GET['edit'])) {
    $majors->editMajor($_GET['edit'],$_GET['new']);
  }
?>
