<?php
   session_start();

   if($_SESSION['is_admin'] != 1){
      header('Location: login.php');
   }

   require_once "../connect.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin panel</title>
   <link rel="stylesheet" href="admin.css">
</head>
<body>
   <!-- nav -->
   <div class="navbar">
      <div class="nav-inside">
         <a href="/admin/index.php">Элементы сайта</a>
         <a href="/admin/goods.php">Редактировать Товары</a>
         <a href="/admin/categories.php" class="active">Редактировать Категории</a>
         <a href="/admin/add.php">Добавить Товар/категорию</a>
      </div>
      <div class="nav-inside">
         <h4><?php echo $_SESSION['username']; ?></h4>
         <a class="fl-right" href="/admin/logout.php">Выйти</a>
      </div>
   </div>
   <!-- nav END -->
   <div class="wrapper">
      <div class="section">
         <?php
            $sql = "SELECT * FROM categories";
            $categories = mysqli_query($conn, $sql);
         ?>
         <h3>Категории:</h3>
            <?php while($cat = mysqli_fetch_assoc($categories)): ?>

            <form action="/admin/update.php" method="post">
               <label><?php echo $cat["name"]; ?><br>
                  <input type="text" name="ru_name" value="<?php echo $cat["ru_name"]; ?>">
               </label><br>
               <textarea name="desc" rows="3" cols="40"><?php echo $cat["description"]; ?></textarea><br>
               <input type="hidden" name="name" value="<?php echo $cat["name"]; ?>">
               <button name="cat_upd" type="submit">Изменить</button>
               <button name="cat_del" type="submit">Удалить</button>
            </form><br><br>


            <?php endwhile; 
               mysqli_close($conn);
            ?>





      </div>






   </div>
   






</body>
</html>