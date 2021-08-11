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
               <div class="card-wrap">
                  <div class="item-card">
                     <div class="card-line">
                        <div class="item-name">
                              <a href="item.php?item=<?php echo $row_cat_out["id"]; ?>"><b><?php echo $row_cat_out["name"]; ?></b></a>
                        </div>
                        <div class="item-time"><?php echo $row_cat_out["ordertime"]; ?></div>
                     </div>
                     <div class="item-img">
                        <a href="item.php?item=<?php echo $row_cat_out["id"]; ?>"><img src="<?php echo $row_cat_out["img"]; ?>" alt=""></a>
                     </div>
                     <div class="item-desc"><?php echo $row_cat_out["description"]; ?></div>
                     <div class="card-line card-line-bottom">
                        <div class="item-price"><?php echo $row_cat_out["cost"]; ?> грн.</div>
                        <div class="plus-one"></div>
                        <div class="item-button"><a href="javascript:void(0);" data-id="<?php echo $row_cat_out["id"]; ?>" onclick=addToCart(this);>В корзину</a></div>
                     </div>
                  </div>
               </div>

            <?php endwhile; ?>

               </div>
            </div>
         <?php endfor; ?>

   </div>







   <div class="goods-out">

   </div>


</body>
</html>