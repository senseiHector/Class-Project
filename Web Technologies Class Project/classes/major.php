<?php
  require("../database/connection.php");

  class Major extends Connection{

    function __construct(){}

    function viewMajors(){
      if($this->connect()){
        $sql = "SELECT * FROM allmajor";
        $result = $this->query($sql);
        if($this->num_rows($result) > 0){
          foreach($result as $row){
            echo "<tr><td>".$row['majorid']."</td><td>".$row['majorname'].
            "</td><td><button id=\"".$row['majorid'].
            "\"class=\"waves-effect waves-light btn-flat red-text\" ".
            "onclick=\"deleteMajor(this.id)\">Delete</button></td><td><button id=\"".
            $row['majorid']."\"class=\"waves-effect waves-light btn-flat \"".
            " onclick=\"startEdit(this.id)\">Edit</button></td></tr>";
          }
        }
        $this->close();
      }
    }

    function insertMajor($newMajor){
      if($this->connect()){
        $sql = "INSERT INTO allmajor (majorname) VALUES ('%s')";
        $this->real_escape($sql,$this->real_string($newMajor));
        $this->close();
      }
    }

    function deleteMajor($majorToDelete){
      if($this->connect()){
        $sql = "DELETE FROM allmajor WHERE majorid = $majorToDelete";
        $result = $this->query($sql);
        if($result)
          echo "success";
        else
          echo "Students Are Registered Under This Major.\nIt Cannot Be Deleted.";
        $this->close();
      }
    }
    function getEdit($majorToGet){
      if($this->connect()){
        $sql = "SELECT * FROM allmajor WHERE majorid = $majorToGet";
        $result = $this->query($sql);
        $row = $this->fetch($result);
        echo $row['majorname'];
        $this->close();
      }
    }

    function editMajor($majorToEdit,$newMajor){
      if($this->connect()){
        $sql = "UPDATE allmajor SET majorname =\"$newMajor\" WHERE majorid = $majorToEdit";
        $result = $this->query($sql);
        $this->close();
      }
    }
  }
?>
