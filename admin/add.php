<?php
   session_start();

   if($_SESSION['is_admin'] != 1){
      header('Location: login.php');
   }

   require_once "../connect.php"; 

   $sql_cat = "SELECT * FROM categories";
   $result_cat = mysqli_query($conn, $sql_cat);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Добавление товара</title>
   <link rel="stylesheet" href="admin.css">
</head>
<body>
   <!-- nav -->
   <div class="navbar">
      <div class="nav-inside">
         <a href="/admin/index.php">Элементы сайта</a>
         <a href="/admin/goods.php">Редактировать Товары</a>
         <a href="/admin/categories.php">Редактировать Категории</a>
         <a href="/admin/add.php" class="active">Добавить Товар/категорию</a>
      </div>
      <div class="nav-inside">
         <h4><?php echo $_SESSION['username']; ?></h4>
         <a class="fl-right" href="/admin/logout.php">Выйти</a>
      </div>
   </div>   
   <!-- nav END -->
   <div class="wrapper">
      <div class="section add">
      <form action="/admin/create.php" method="post">
            <label for="category">Категория:</label><br>
            <select name="category" id="category">
               <?php while($row_cat = mysqli_fetch_assoc($result_cat)): ?>
                  <option value="<?php echo $row_cat["name"]; ?>"><?php echo $row_cat["ru_name"]; ?></option>
               <?php endwhile; ?>
            </select><br><br>
            <label for="name">Имя:</label><br>
            <input type="text" name="name" id="name"><br><br>
            <label for="ordertime">Время заказа:</label><br>
            <select name="ordertime" id="ordertime">
               <option value="order">Пiд замовлення</option>
               <option value="stock">У наявностi</option>
            </select><br><br>
            <label for="description">Описание товара:</label><br>
            <textarea name="description" id="description" rows="3" cols="40"></textarea><br><br>
            <label for="cost">Цена ("грн" уже дописано):</label><br>
            <input type="text" name="cost" id="cost"><br><br>
            
            <br>
            <button type="submit">Добавить товар</button>
         </form>
      </div>
   </div>










</body>
</html>