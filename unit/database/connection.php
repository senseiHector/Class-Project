<?php
  class Connection{

    private $database_connection;

    function __construct(){}

    function ret_connection(){
      return $this->database_connection;
    }

    function connect(){
      include_once("credentials.php");
      $this->database_connection = mysqli_connect($server,$db_user,$db_pass,$db);
      if($this->database_connection)
        return true;
      else
        return false;
    }

    function real_escape($sql){
      mysqli_query($this->database_connection, $sql);
    }

    function query($sql){
      $result = mysqli_query($this->database_connection,$sql);
      return $result;
    }

    function prep($sql){
      return $this->database_connection->prepare($sql);
    }

    function execute($statement){
      if($statement->execute()){
        return true;
      }
      else{
        echo $this->error();
        return false;
      }
    }

    function fetch($result){
      return mysqli_fetch_assoc($result);
    }

    function get_id(){
      return mysqli_insert_id($this->database_connection);
    }

    function num_rows($result){
      return mysqli_num_rows($result);
    }

    function affected_rows($statement=false){
      if(!$statement)
        return mysqli_affected_rows($this->database_connection);
      else
        return $statement->affected_rows;
    }

    function error(){
      return mysqli_error($this->database_connection);
    }

    function close(){
      mysqli_close($this->database_connection);
    }
  }
?>
