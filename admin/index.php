<?php
   session_start();

   if($_SESSION['is_admin'] != 1){
      header('Location: login.php');
   }

   require_once "../connect.php"; 

   $sql_from_vars = "SELECT * FROM variables";
   $variables = mysqli_query($conn, $sql_from_vars);

   $sql_fav = "SELECT * FROM goods";
   $result_fav = mysqli_query($conn, $sql_fav);
   while($res_fav = mysqli_fetch_assoc($result_fav)){
      $fav_arr[] = $res_fav;
   }
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
   <div class="section favorites">
         <h3>Избранное:</h3>
         <p><b>Сейчас избранное:</b></p>
         <p><b>---◘---◘---◘---◘---►</b></p>
         <?php
            $sql_fav_now = "SELECT * FROM goods WHERE `isfavorite` IS NOT NULL ORDER BY `isfavorite`";
            $fav_now = mysqli_query($conn, $sql_fav_now);

            while($fav = mysqli_fetch_assoc($fav_now)): ?>
               <p><?php echo $fav["isfavorite"]; ?> = <?php echo $fav["name"]; ?></p>
            <?php endwhile; ?><br>
         <?php for ($i=1; $i <= 4; $i++): ?>
               <form action="/admin/update.php" method="post">
                  <label for="fav_<?php echo $i; ?>">Избранный <?php echo $i; ?></label>
                  <select name="favid" id="fav_<?php echo $i; ?>">
                     <?php foreach($fav_arr as $fav_ar): ?>
                        <option value="<?php echo $fav_ar["id"]; ?>"><?php echo $fav_ar["name"]; ?></option>
                     <?php endforeach; ?>
                  </select>
                  <input type="hidden" value="fav_<?php echo $i; ?>" name="favorite">
                  <button type="submit">Изменить</button>
               </form><br>
         <?php endfor; ?>
      </div>
      <div class="section variables">
         <h3>Главная + подвал:</h3>
         <?php while($var = mysqli_fetch_assoc($variables)): ?>

         <form action="/admin/update.php" method="post">
            <input type="hidden" name="title" value="<?php echo $var["title"]; ?>">
            <label><?php echo $var["title"]; ?><br>
               <textarea name="value" rows="3" cols="40"><?php echo $var["value"]; ?></textarea>
            </label><br>
            <input type="hidden" name="variables">
            <button type="submit">Изменить</button>
         </form>


         <?php endwhile; 
             mysqli_close($conn);
         ?>
      </div>
      
      




   </div>



</body>
</html>