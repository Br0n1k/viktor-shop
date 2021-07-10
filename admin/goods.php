<?php
   session_start();

   if($_SESSION['is_admin'] != 1){
      header('Location: login.php');
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Товары</title>
   <link rel="stylesheet" href="admin.css">
</head>
<body>
   <div class="navbar">
      <div class="nav-inside">
         <a href="/admin/index.php">Элементы сайта</a>
         <a href="/admin/goods.php" class="active">Редактировать Товары</a>
         <a href="/admin/add.php">Добавить Товар</a>
      </div>
      <div class="nav-inside">
         <h4><?php echo $_SESSION['username']; ?></h4>
         <a class="fl-right" href="/admin/logout.php">Выйти</a>
      </div>
   </div>   
   <div class="goods-out">

   </div>


</body>
</html>