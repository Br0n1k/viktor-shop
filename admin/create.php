<?php
   if(isset($_POST["category"])){
   $category = $_POST["category"];
   }
   if(isset($_POST["name"])){
       $name = $_POST["name"];
   }
   if(isset($_POST["ordertime"])){
       $ordertime = $_POST["ordertime"];
   }
   if(isset($_POST["img"])){
       $img = $_POST["img"];
   }
   if(isset($_POST["img1"])){
       $img1 = $_POST["img1"];
   }
   if(isset($_POST["img2"])){
       $img2 = $_POST["img2"];
   }
   if(isset($_POST["img3"])){
       $img3 = $_POST["img3"];
   }
   if(isset($_POST["img4"])){
       $img4 = $_POST["img4"];
   }
   if(isset($_POST["description"])){
       $description = $_POST["description"];
   }
   if(isset($_POST["cost"])){
       $cost = $_POST["cost"];
   }
   
   var_dump($category);
   var_dump($name);
   var_dump($ordertime);
   var_dump($cost);

   require_once "../connect.php"; 

   


   
   // $sql = "INSERT INTO `goods` (`id`, `category`, `isfavorite`, `name`, `ordertime`, `img`, `img1`, `img2`, `img3`, `img4`, `description`, `cost`) 
   // VALUES (NULL, '$category', NULL, '$name', '$ordertime', '$img', '$img1', '$img2', '$img3', '$img4', '$description', '$cost')";
   // mysqli_query($conn, $sql);



   mysqli_close($conn);
   // header('Location: /admin/add.php');
?>