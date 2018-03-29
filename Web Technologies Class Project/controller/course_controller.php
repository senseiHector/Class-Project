<?php
  require("../classes/course.php");
  $courses = new Course;
  if(isset($_GET['load'])){
    $courses->viewCourses();
  }
  elseif(isset($_GET['adminload'])){
    $courses->viewAllCourses();
  }
  elseif(isset($_GET['drop'])) {
    $courses->dropCourse($_GET['drop'],$_GET['grade']);
  }
  elseif(isset($_GET['offer'])) {
    $courses->getMajorsOffering();
  }
  elseif(isset($_GET['majorcourse'])) {
    $courses->getMajorCourses();
  }
  elseif(isset($_GET['register'])) {
    $courses->registerCourse($_GET['register']);
  }
  elseif(isset($_GET['getedit'])) {
    $courses->getEdit($_GET['getedit']);
  }
  elseif(isset($_GET['insert'])) {
    $courses->insertCourse($_GET['insert'],$_GET['code'],$_GET['year'],$_GET['n_major']);
  }
  /*
  elseif(isset($_GET['edit'])) {
    $majors->editMajor($_GET['edit'],$_GET['new']);
  }
  */
?>
