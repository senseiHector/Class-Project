<?php
  $email = $username = $password = $firstname = $lastname = $gender = $major=
  $email_err = $email_error = $username_err = $password_error = $password_err = $firstname_err = $lastname_err=
  $gender_err = $major_err = $courses = $userStat = $emailStat= $login_notice="";

  $notice = 0;

  if(isset($_GET['ses']))
    $notice = $_GET['ses'];

  if(isset($_POST['login']))
    validLogin();
  elseif(isset($_POST['register']))
    validRegistry();

  if(isset($_GET['checkU']))
    checkUsername($_GET['checkU']);

  if(isset($_GET['checkE']))
    checkEmail($_GET['checkE']);

  if(isset($_GET['drop']))
    majorDrop();

  if(isset($_GET['major']))
    courseChecks();

  function clean($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function validLogin(){
    $valid = true;

    $GLOBALS['username'] = isset($_POST['username'])? clean($_POST['username']):"";
    if(empty($GLOBALS['username'])){
      $GLOBALS['username_err'] = " *required";
      $valid = false;
    }
    $GLOBALS['password'] = isset($_POST['password'])? $_POST['password']:"";
    if(empty($GLOBALS['password'])){
      $GLOBALS['password_err'] = " *required";
      $valid = false;
    }

    if($valid){
      login();
    }
  }

  function validRegistry(){
    $valid = true;

    $GLOBALS['firstname'] = isset($_POST['firstname'])? clean($_POST['firstname']):"";
    if(empty($GLOBALS['firstname'])){
      $GLOBALS['firstname_err'] = " *required";
      $valid = false;
    }
    $GLOBALS['lastname'] = isset($_POST['lastname'])? clean($_POST['lastname']):"";
    if(empty($GLOBALS['lastname'])){
      $GLOBALS['lastname_err'] = " *required";
      $valid = false;
    }
    $GLOBALS['username'] = isset($_POST['username'])? clean($_POST['username']):"";
    if(empty($GLOBALS['username'])){
      $GLOBALS['username_err'] = " *required";
      $valid = false;
    }
    else{
      $GLOBALS['userStat'] = isset($_POST['userStat'])? clean($_POST['userStat']):"";
      if($GLOBALS['userStat'] !="y")
        $valid = false;
    }
    $GLOBALS['password'] = isset($_POST['password'])? $_POST['password']:"";
    if(empty($GLOBALS['password'])){
      $GLOBALS['password_err'] = " *required";
      $valid = false;
    }
    $passPattern = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_])[a-zA-Z0-9!@#$%^&*_]{6,20}$/', $GLOBALS['password']);
    if(!$passPattern)
      $GLOBALS['password_error'] = "<br>Password Must Include An UpperCase Letter, A LowerCase".
       "Letter,<br> A Number, A Special Character And At Least 6 Characters";

    $GLOBALS['email'] = isset($_POST['email'])? clean($_POST['email']):"";
    if(empty($GLOBALS['email'])){
      $GLOBALS['email_err'] = " *required";
      $valid = false;
    }else{
      $GLOBALS['emailStat'] = isset($_POST['emailStat'])? clean($_POST['emailStat']):"";
      if($GLOBALS['emailStat'] !="y")
        $valid = false;
    }
    $emailPattern = preg_match('/\S+@+\S+\.+\S/', $GLOBALS['email']);
    if(!$emailPattern)
      $GLOBALS['email_error'] = "<br>Email is Invalid";


    $GLOBALS['gender'] = isset($_POST['gender'])? clean($_POST['gender']):"";
    if(empty($GLOBALS['gender'])){
      $GLOBALS['gender_err'] = " *required";
      $valid = false;
    }
    $GLOBALS['major'] = isset($_POST['majorSelect'])? clean($_POST['majorSelect']):"";
    if(empty($GLOBALS['major'])){
      $GLOBALS['major_err'] = " *required";
      $valid = false;
    }

    if($valid){
      register();
    }
  }

  function register(){
    require_once("../database/connection.php");
    $connection = new Connection;

    $permission = 2;
    $status = "ACTIVE";
    $courses = array();

    $courses = isset($_POST['courses'])? $_POST['courses']:"";
    $GLOBALS['password'] = password_hash($GLOBALS['password'], PASSWORD_DEFAULT);
    if($connection->connect()){
      $sql = "INSERT INTO useraccount (username, pwd, fname,lname,email,".
      " gender, major_id,userstatus,per_id) VALUES (?,?,?,?,?,?,?,?,?)";
      $paramTypes = "ssssssisi";

      $result = $connection->prep($sql,$paramTypes,$GLOBALS['username'],$GLOBALS['password'],
                      $GLOBALS['firstname'],$GLOBALS['lastname'],
                      $GLOBALS['email'],$GLOBALS['gender'],$GLOBALS['major'],
                      $status,$permission);

      $user_id = "";
      if ($result) {
        if($connection->affected_rows($result) > 0){
          $user_id = $connection->get_id();
          if(!empty($courses)){
          foreach($courses as $course){
            $sql_two = "INSERT INTO usercourses (user_id, majorcourse_id) VALUES ".
            "('$user_id','$course')";

            $result_two = $connection->query($sql_two);
          }
        }
          header("location: ../login/index.php");
        }
        else
          echo "Could not Register User at this Time</br>";
      } else {
        echo "Error: " .$sql."<br>".$connection->error();
      }
      $connection->close($result);
    }
    else
      echo "Connection Failed";
  }

  function login(){
    require_once("../database/connection.php");
    $permission = 0;

    $connection = new Connection;
    if($connection->connect()){
      $sql = "SELECT * FROM useraccount WHERE username = \"".$GLOBALS['username']."\" AND userstatus = \"ACTIVE\"";
      $result = $connection->query($sql);
      if ($result) {
        if($connection->num_rows($result) > 0){
          $row = mysqli_fetch_assoc($result);
          if(password_verify($GLOBALS['password'], $row['pwd'])){
            session_start();
            $_SESSION['firstname'] = $row['fname'];
            $_SESSION['lastname'] = $row['lname'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['per'] = $row['per_id'];
            $_SESSION['id'] = $row['userid'];
            $_SESSION['major'] = $row['major_id'];
            $permission = $row['per_id'];
            if($permission == 1)
              header('Location: ../pages/dashboard_admin.php');
            else
              header('Location: ../pages/dashboard.php');
          }
          else
            $GLOBALS['login_notice']="</br>Wrong Password";
        }
        else
          $GLOBALS['login_notice']="User Does Not Exist</br>";
      } else {
        echo "Error: " . $sql . "<br>" . $connection->error();
      }
      $connection->close();
    }
    else
      echo "Connection Failed";
  }

  function checkUsername($user_name){
    include("../database/connection.php");
    $connection = new Connection;

    if($connection->connect()){
      $sql = "SELECT * FROM useraccount WHERE username = '$user_name'";
      $result = $connection->query($sql);
      if($connection->num_rows($result) > 0)
        echo "1";
      else
        echo "0";
      $connection->close();
    }
  }

  function checkEmail($e_mail){
    include("../database/connection.php");
    $connection = new Connection;

    if($connection->connect()){
      $sql = "SELECT * FROM useraccount WHERE email = '$e_mail'";
      $result = $connection->query($sql);
      if($connection->num_rows($result) > 0)
        echo "1";
      else
        echo "0";
      $connection->close();
    }
  }

  function majorDrop(){
    include("../database/connection.php");
    $connection = new Connection;

    if($connection->connect()){
      $sql = "SELECT * FROM allmajor";
      $result = $connection->query($sql);
      if($connection->num_rows($result) > 0){
        foreach($result as $row){
          echo "<option value =\"".$row['majorid']."\">".
              $row['majorname']."</option>";
        }
      }
      $connection->close();
    }
  }

  function courseChecks(){
    include("../database/connection.php");
    $connection = new Connection;

    if(isset($_GET['major'])){
      $major = $_GET['major'];
      if($connection->connect()){
        $sql_one = "SELECT * FROM majorcourses WHERE major_id = $major";
        $result_one = $connection->query($sql_one);
        if($connection->num_rows($result_one) > 0){
          foreach($result_one as $row_one){
            $id = $row_one['course_id'];
            $sql_two = "SELECT * FROM allcourses WHERE courseid = $id";
            $result_two = $connection->query($sql_two);
            if($connection->num_rows($result_two) > 0){
              foreach($result_two as $row_two){
                echo "<p><input type=\"checkbox\" name=\"courses[]\" id=\"".
                $row_two['coursecode']."\" value=\"".$row_one['majorcourseid'].
                "\"/><label for=\"".$row_two['coursecode'].
                "\">".$row_two['coursename']."</label></p>";
              }
            }
          }
        }
        else{
          echo "No Courses Under This Major Yet";
        }
      }
    }
  }
?>
