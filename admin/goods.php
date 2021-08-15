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
   <title>Товары</title>
   <link rel="stylesheet" href="admin.css">
</head>
<body>
   <!-- nav -->
   <div class="navbar">
      <div class="nav-inside">
         <a href="/admin/index.php">Элементы сайта</a>
         <a href="/admin/goods.php" class="active">Редактировать Товары</a>
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
   <?php 
         $sql_cat = "SELECT * FROM categories ORDER BY name";
         $result_cat = mysqli_query($conn, $sql_cat);
      ?>
      <?php while($row_cat = mysqli_fetch_assoc($result_cat)){
          $cat_arr_name[] = $row_cat["name"];
          $cat_arr_ru_name[] = $row_cat["ru_name"];
          $cat_arr_description[] = $row_cat["description"];
      }
      ?>

         <?php for($i = 0; $i < count($cat_arr_name); $i++): 
            $sql_cat_out = "SELECT * FROM goods WHERE category = '$cat_arr_name[$i]'";
            $result_cat_out = mysqli_query($conn, $sql_cat_out);
            //section here
         ?>
            <div class="section">
               <h2><?php echo $cat_arr_ru_name[$i]; ?></h2>
               <h3><?php echo $cat_arr_description[$i]; ?></h3>
               <div class="item-cards cards-catalog">
            
            <?php while($row_cat_out = mysqli_fetch_assoc($result_cat_out)): 
               //goods here
            ?>
            <hr>
               <form action="/admin/update.php" method="post" enctype="multipart/form-data" class="goods-form">
                  <div class="item-name">
                     Ссылка на сайте: <a href="/item.php?item=<?php echo $row_cat_out["id"]; ?>"><b><?php echo $row_cat_out["name"]; ?></b></a>
                  </div><br>
                  <label>Название:<br>
                     <input type="text" name="ru_name" value="<?php echo $row_cat_out["name"]; ?>">
                  </label><br><br>
                  <label for="ordertime">Время заказа:</label><br>
                  <select name="ordertime" id="ordertime">
                     <option value="order">Пiд замовлення</option>
                     <option value="stock" 
                     <?php 
                        $f = $row_cat_out["ordertime"];
                        if($f == "У наявностi"){
                           echo "selected";
                        }
                  ?>>У наявностi</option>
                  </select><br><br>
                  <div class="item-img-big">Основное: <br>
                     <img src="<?php echo $row_cat_out["img"]; ?>" alt="">
                  </div>
                  <div class="item-imgs">Дополнительные: <br>
                     <img src="<?php echo $row_cat_out["img1"]; ?>" alt="No image 1 ">
                     <img src="<?php echo $row_cat_out["img2"]; ?>" alt="No image 2 ">
                     <img src="<?php echo $row_cat_out["img3"]; ?>" alt="No image 3 ">
                     <img src="<?php echo $row_cat_out["img4"]; ?>" alt="No image 4 ">
                  </div><br>
                  <label for="bigimg">*Фото (основное, желательно 3х2):</label><br>
                  <input type="file" name="bigimg" id="bigimg"><br><br>
                  <label for="img1">Фото дополнительное 1:</label><br>
                  <input type="file" name="img1" id="img1"><br><br>
                  <label for="img2">Фото дополнительное 2:</label><br>
                  <input type="file" name="img2" id="img2"><br><br>
                  <label for="img3">Фото дополнительное 3:</label><br>
                  <input type="file" name="img3" id="img3"><br><br>
                  <label for="img4">Фото дополнительное 4:</label><br>
                  <input type="file" name="img4" id="img4"><br><br>
                  <div class="item-desc">
                     <label>*Описание товара:</label><br>
                     <textarea name="description" rows="4" cols="50" required ><?php echo $row_cat_out["description"]; ?></textarea><br><br>
                  </div>
                  <div class="item-price">
                     <label for="cost">*Цена ("грн." уже дописано):</label><br>
                     <input type="text" name="cost" id="cost" required value="<?php echo $row_cat_out["cost"]; ?>">
                  </div><br>
                  <button name="good_upd" value="<?php echo $row_cat_out["id"]; ?>" type="submit">Изменить</button>
                  <button name="good_del" value="<?php echo $row_cat_out["id"]; ?>" type="submit">Удалить</button>
               </form>

            <?php endwhile; ?>

               </div>
            </div>
         <?php endfor; ?>

   </div>







   <div class="goods-out">

   </div>


</body>
</html>