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
      <form action="/admin/create.php" method="post" enctype="multipart/form-data">
            <label for="category">*Категория:</label><br>
            <select name="category" id="category">
               <?php while($row_cat = mysqli_fetch_assoc($result_cat)): ?>
                  <option value="<?php echo $row_cat["name"]; ?>"><?php echo $row_cat["ru_name"]; ?></option>
               <?php endwhile; ?>
            </select><br><br>
            <label for="name">*Имя:</label><br>
            <input type="text" name="name" id="name" required ><br><br>
            <label for="ordertime">*Время заказа:</label><br>
            <select name="ordertime" id="ordertime">
               <option value="order">Пiд замовлення</option>
               <option value="stock">У наявностi</option>
            </select><br><br>
            <label for="description">*Описание товара:</label><br>
            <textarea name="description" id="description" rows="3" cols="40" required ></textarea><br><br>
            <label for="cost">*Цена ("грн" уже дописано):</label><br>
            <input type="text" name="cost" id="cost" required ><br><br>
            <label for="bigimg">*Фото (основное, желательно 3х2):</label><br>
            <input type="file" name="bigimg" id="bigimg"><br><br><br>

            <label for="img1">Фото (дополнительное 1):</label><br>
            <input type="file" name="img1" id="img1"><br><br>
            <label for="img2">Фото (дополнительное 2):</label><br>
            <input type="file" name="img2" id="img2"><br><br>
            <label for="img3">Фото (дополнительное 3):</label><br>
            <input type="file" name="img3" id="img3"><br><br>
            <label for="img4">Фото (дополнительное 4):</label><br>
            <input type="file" name="img4" id="img4"><br><br>
            
            <br>
            <button name="goods" type="submit">Добавить товар</button>
         </form>
      </div>
   </div>










</body>
</html>