<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Каталог</title>
   <link rel="stylesheet" href="css/all.min.css">
   <link rel="stylesheet" href="css/main.css">
</head>
<body>
   <!-- NAVbar -->
   <div class="navbar">
      <div class="nav-inside">
      <a href="javascript:void(0);" class="mobile-menu-button"><i class="fas fa-caret-square-down"></i></a>
         <div class="nav-left">
            <a href="index.php" class="desktop-menu-link"><h2>Главная</h2></a>
            <a href="catalog.php" class="desktop-menu-link opened-show">Каталог</a>
            <a href="about.php" class="desktop-menu-link opened-show">О нас</a>
            <a href="contacts.php" class="desktop-menu-link opened-show">Контакты</a>
         </div>
         <div class="nav-right">
            <a href="cart.php" class="cart-link"><i class="fas fa-shopping-cart"></i> Корзина</a>
         </div>
      </div>
   </div>
   <!-- NAVbar END -->
   <!-- wrapper -->
   <div class="wrapper">
      <?php require_once "connect.php"; ?>
      <?php 
         $sql_cat = "SELECT * FROM categories";
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
                        <div class="item-name"><?php echo $row_cat_out["name"]; ?></div>
                        <div class="item-time"><?php echo $row_cat_out["ordertime"]; ?></div>
                     </div>
                     <div class="item-img"><img src="<?php echo $row_cat_out["img"]; ?>" alt=""></div>
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
   <!-- wrapper END -->
   <!-- footer -->
   <?php require_once "footer.php";?>
   <!-- footer END -->
   
   <script src="js/jquery-3.6.0.min.js"></script>
   <script src="js/jquery.maskedinput.min.js"></script>
   <script src="js/main.js"></script>
</body>
</html>