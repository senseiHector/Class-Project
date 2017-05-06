<?php
  require("../database/connection.php");
  require("../settings/core_ini.php");

  class Course extends Connection{

    function __construct(){}

    function viewCourses(){
      if($this->connect()){
        $id= $_SESSION['id'];
        $sql_one = "SELECT * FROM usercourses WHERE user_id = $id";
        $result_one = $this->query($sql_one);
        if($this->num_rows($result_one) > 0){
          foreach($result_one as $row_one){
            $id_2= $row_one['majorcourse_id'];
            $sql_two = "SELECT * FROM majorcourses WHERE majorcourseid = $id_2";
            $result_two = $this->query($sql_two);
            if($this->num_rows($result_two) > 0){
              foreach($result_two as $row_two){
                $id_3= $row_two['course_id'];
                $sql_three = "SELECT * FROM allcourses WHERE courseid = $id_3";
                $result_three = $this->query($sql_three);
                if($this->num_rows($result_three) > 0){
                  foreach($result_three as $row_three){
                    if($row_one['grade'] == null)
                      $grade = "Not Graded";
                    else
                      $grade = $row_one['grade'];
                    $gradeid = "grade".$row_three['courseid'];
                    echo "<tr><td>".$row_three['coursecode']."</td><td>".
                    $row_three['coursename']."</td><td id=\"$gradeid\">$grade</td><td><button id=\"".$row_three['courseid'].
                    "\"class=\"waves-effect waves-light btn-flat red-text\"".
                    " onclick=\"dropCourse(this.id)\">UNREGISTER</button></td></tr>";
                  }
                }
              }
            }
          }
        }
        $this->close();
      }
    }

    function dropCourse($courseToDrop, $grade){
      if($grade != "Not Graded"){
        echo "Cannot Drop Course After Grading";
      }
      else{
        if($this->connect()){
          $major = $_SESSION['major'];
          $sql = "DELETE FROM usercourses WHERE majorcourse_id = ".
          "(SELECT majorcourseid FROM majorcourses WHERE course_id =$courseToDrop and major_id =$major)";
          $result = $this->query($sql);
          $this->close();
        }
      }
    }

    function getMajorCourses(){
      if($this->connect()){
        $id= $_SESSION['major'];
        $sql_one = "SELECT * FROM majorcourses WHERE major_id = $id";
        $result_one = $this->query($sql_one);
        if($this->num_rows($result_one) > 0){
          foreach($result_one as $row_one){
            $id_2= $row_one['course_id'];

            $sql_two = "SELECT * FROM allcourses WHERE courseid = $id_2 AND courseid NOT IN (SELECT course_id FROM majorcourses, usercourses WHERE user_id=".$_SESSION['id']." and majorcourse_id=majorcourseid)";
            $result_two = $this->query($sql_two);
            if($this->num_rows($result_two) > 0){
              foreach($result_two as $row_two){
                echo "<tr><td>".$row_two['coursecode']."</td><td>".
                $row_two['coursename']."</td><td><button id=\"".$row_two['courseid'].
                "\"class=\"waves-effect waves-light btn-flat green-text\"".
                " onclick=\"registerCourse(this.id)\">REGISTER</button></td></tr>";
              }
            }
          }
        }
        $this->close();
      }
    }

    function getEdit($courseToGet){
      if($this->connect()){
        $sql = "SELECT * FROM allcourses WHERE courseid = $courseToGet";
        $result = $this->query($sql);
        $row = $this->fetch($result);
        echo $row['coursename'];
        $this->close();
      }
    }

    function registerCourse($courseToRegister){
      if($this->connect()){
      $sql = "INSERT INTO usercourses (user_id, majorcourse_id) VALUES ".
      "(\"".$_SESSION['id']."\",(SELECT majorcourseid FROM majorcourses WHERE major_id = ".$_SESSION['major']." AND course_id='$courseToRegister'))";

      $result = $this->query($sql);
      }
    }

    function viewAllCourses(){
      if($this->connect()){
        $sql = "SELECT * FROM allcourses";
        $result = $this->query($sql);
        if($this->num_rows($result) > 0){
          foreach($result as $row){
            echo "<tr><td>".$row['coursecode']."</td><td>".$row['coursename'].
            "</td><td><button id=\"".$row['courseid'].
            "\"class=\"waves-effect waves-light btn-flat red-text\"".
            " onclick=\"deleteCourse(this.id)\">Delete</button></td></tr>";
          }
        }
        $this->close();
      }
    }

    function getMajorsOffering(){
      if($this->connect()){
        $sql = "SELECT * FROM allmajor";
        $result = $this->query($sql);
        if($this->num_rows($result) > 0){
          foreach($result as $row){
            echo "<p><input type=\"checkbox\" class=\"majorsOffering\" id=\"".
            $row['majorname']."\" value=\"".$row['majorid'].
            "\"/><label for=\"".$row['majorname'].
            "\">".$row['majorname']."</label></p>";
          }
        }
      }
    }
  }
?>
