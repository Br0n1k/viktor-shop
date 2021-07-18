<?php
   session_start();

   if($_SESSION['is_admin'] != 1){
      header('Location: login.php');
   }

   require_once "../connect.php"; 

   $sql_from_vars = "SELECT * FROM variables";
   $variables = mysqli_query($conn, $sql_from_vars);
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
         <a href="/admin/index.php" class="active">Элементы сайта</a>
         <a href="/admin/goods.php">Редактировать Товары</a>
         <a href="/admin/categories.php">Редактировать Категории</a>
         <a href="/admin/add.php">Добавить Товар/категорию</a>
      </div>
      <div class="nav-inside">
         <h4><?php echo $_SESSION['username']; ?></h4>
         <a class="fl-right" href="/admin/logout.php">Выйти</a>
      </div>
   </div>
   <!-- nav END -->
   
   <div class="wrapper">
      <div class="section variables">
         <h3>Главная + подвал:</h3>
         <?php while($var = mysqli_fetch_assoc($variables)): ?>

         <form action="/admin/update.php" method="post">
            <input type="hidden" name="title" value="<?php echo $var["title"]; ?>">
            <label><?php echo $var["title"]; ?><br>
               <textarea name="value" rows="3" cols="40"><?php echo $var["value"]; ?></textarea>
            </label><br>
            
            <button type="submit">Изменить</button>
         </form>


         <?php endwhile; 
            mysqli_close($conn);
         ?>
      </div>
      <div class="section favorites">
         <h3>Избранное:</h3>
         





      </div>
      




   </div>



</body>
</html>