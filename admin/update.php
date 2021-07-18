<?php
   if(isset($_POST["title"])){
       $title = $_POST["title"];
   }
   if(isset($_POST["value"])){
       $value = $_POST["value"];
   }

   require_once "../connect.php"; 

   $sql = "UPDATE `variables` SET `value` = '$value' WHERE `title` = '$title'";
   mysqli_query($conn, $sql);
   mysqli_close($conn);
   header('Location: /admin/index.php');
?>