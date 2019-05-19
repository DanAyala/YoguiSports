<?php
  require_once('db_credentials.php');

  function db_connect(){
      $connection = mysqli_connect(localhost, 'danielAyala', daniel123, yoguisportsdb);
      confirm_db_connect();
      return $connection;
  }
  function db_disconnect($connection){

    if(isset($connection)){
      mysqli_close($connection);
    }
   }

   function confirm_db_connect(){
     if(mysqli_connect_errno()){
     $msg = "database connection failed: ";
     $msg .= mysqli_connect_error();
     $msg .= " (". mysqli_connect_errno(). ")";
     exit($msg);
     }

   }

   function confirm_result_set($result_set){
     if(!$result_set){

       exit("database query failed");
     }

   }


 ?>
