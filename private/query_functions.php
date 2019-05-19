<?php

   function find_all_news() {
     global $db;

     $sql = "select * from news order by id ASC";
     //echo $sql . " ";
     $result = mysqli_query($db, $sql);
     confirm_result_set($result);
     return $result;
   }

/*   function find_all_pages() {
     global $db;

     $sql = "select * from pages order by position ASC";
     //echo $sql . " ";
     $result = mysqli_query($db, $sql);
     confirm_result_set($result);
     return $result;
   }*/

   function find_news_by_id($id) {
     global $db;

     $sql = "SELECT * FROM news WHERE id='" . $id ."'";
     $result = mysqli_query($db, $sql);
     confirm_result_set($result);
     $subject = mysqli_fetch_assoc($result);
     mysqli_free_result($result);
     return $subject;
   }



   function insert_news($news) {
     global $db;

     $sql = "INSERT INTO news (titulo, imagen, descripcion, fecha) VALUES ";
     $sql .= "('" . $news['titulo'] . "', " . "'" . $news['imagen'] . "', ";
     $sql .= "'" . $news['descripcion'] . "', " . "'" . $news['fecha'] . "')";

     $result = mysqli_query($db, $sql);

     if ($result) {
       return true;
     } else {
       echo mysqli_error($db);
       db_disconnect($db);
       exit;
     }
   }

   function update_news($news) {
     global $db;

     $sql = "UPDATE news SET titulo='" . $news['titulo'] . "', ";
     $sql .= "imagen='" . $news['imagen'] . "', descripcion='" . $news['descripcion'] . "', fecha='" . $news['fecha'];
     $sql .= "' WHERE id='" . $news['id'] . "' LIMIT 1";



     $result = mysqli_query($db, $sql);

     //For update statements
     if ($result) {
       return  true;
     } else {

       echo mysqli_error($db);
       db_disconnect($db);
       exit;
     }
   }


   function delete_news($id) {
     global $db;

     $sql = "DELETE FROM news WHERE id='" . $id . "' LIMIT 1";
     $result = mysqli_query($db, $sql);

     if ($result) {
       return true;
     } else {
       echo mysqli_error($db);
       db_disconnect($db);
       exit;
     }
   }

   function unique_news($news) {
     global $db;

     $sql = "SELECT titulo FROM news WHERE titulo = '" . $news . "'";
     $result = mysqli_query($db, $sql);
     confirm_result_set($result);
     $news = mysqli_fetch_assoc($result);
     mysqli_free_result($result_set);
     if ($news['titulo']) {
       return "noticia duplicada <br>";
     }
     return '';
   }


   function find_user($user, $pass){
     global $db;

     $sql = "SELECT * FROM users WHERE user_name='" . $user ."' and user_pass='" . $pass . "'";
     $result = mysqli_query($db, $sql);
     confirm_result_set($result);
     return $result;

   }

 ?>
