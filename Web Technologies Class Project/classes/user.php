<?php
  require("../database/connection.php");

  class User extends Connection{
    function __construct(){}

    function viewUsers(){
      if($this->connect()){
        $sql = "SELECT * FROM useraccount WHERE userstatus = \"ACTIVE\"";
        $result = $this->query($sql);
        if($this->num_rows($result) > 0){
          foreach($result as $row){
            if($row['per_id']==2){
              $role = "Student";
              $admin = "Make Admin";
            }
            else{
              $role = "Admin";
              $admin = "Revoke Admin";
            }
            echo "<tr><td>".$row['userid']."</td><td>".
            $row['fname']."</td><td>".$row['lname']."</td><td>$role</td><td><button id=\"".
            $row['userid']."\"class=\"waves-effect waves-light btn-flat red-text\" ".
            "onclick=\"deleteUser(this.id)\">Remove User</button></td><td><button id=\"".
            $row['userid']."\"class=\"waves-effect waves-light btn-flat \"".
            " onclick=\"adminStatus(this.id)\">$admin</button></td></tr>";
          }
        }
        $this->close();
      }
    }

    function adminStatus($user_id){
      if($this->connect()){
        $sql = "SELECT per_id FROM useraccount WHERE userid = $user_id";
        $result = $this->query($sql);
        if($this->num_rows($result) > 0){
          $row = $this->fetch($result);
          if($row['per_id']==1){
            $sql_two = "UPDATE useraccount SET per_id = 2 WHERE userid = $user_id";
            $result_two = $this->query($sql_two);
          }
          else{
            $sql_two = "UPDATE useraccount SET per_id = 1 WHERE userid = $user_id";
            $result_two = $this->query($sql_two);
          }
        }
        $this->close();
      }
    }

    function removeUser($user_id){
      if($this->connect()){
        $sql = "UPDATE useraccount SET userstatus = \"INACTIVE\" WHERE userid = $user_id";
        $result = $this->query($sql);
        $this->close();
      }
    }
  }
?>
