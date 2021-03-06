<?php require_once "connect.php"; 
      $sql_from_vars = "SELECT * FROM variables";
      $variables = mysqli_query($conn, $sql_from_vars);

      $vars = [];

      while($var = mysqli_fetch_assoc($variables)){
         $vars[$var["title"]] = $var["value"];
      }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Handmade stuff</title>
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
   <div class="wrapper main-wrapper">
      <!-- Main-slider -->
      <div class="slider">
         <div class="slider-line">
            <div class="slide slide-1">
               <img src="/images/slider-full/1.jpg" alt="">
               <div class="slider-absolute">
                  <h1><?php echo $vars["slide1_title"]; ?></h1>
                  <h4><?php echo $vars["slide1_text"]; ?></h4><br><br> 
                  <a href="#" class="slider-catalog-button">Перейти в каталог</a>
               </div>
            </div>
            <div class="slide slide-2">
               <img src="/images/slider-full/2.jpg" alt="">
               <div class="slider-absolute">
                  <h1><?php echo $vars["slide2_title"]; ?></h1>
                  <h4><?php echo $vars["slide2_text"]; ?></h4><br><br> 
                  <a href="#" class="slider-catalog-button">Перейти в каталог</a>
               </div>
            </div>
            <div class="slide slide-3">
               <img src="/images/slider-full/3.jpg" alt="">
               <div class="slider-absolute">
                  <h1><?php echo $vars["slide3_title"]; ?></h1>
                  <h4><?php echo $vars["slide3_text"]; ?></h4><br><br>
                  <a href="#" class="slider-catalog-button">Перейти в каталог</a>
               </div>
            </div>
         </div>
         <div class="slider-buttons">
            <a href="#" class="slider-left">< </a>
            <a href="#" class="slider-right"> ></a>
         </div>
      </div>
      <!-- Main-slider END -->
      <!-- popular -->
      <div class="section popular">
         <h2>Популярные товары:</h2>
         <div class="item-cards">
   <?php $sql = "SELECT * FROM goods WHERE isfavorite IS NOT NULL ORDER BY `isfavorite`";
         $result = mysqli_query($conn, $sql);

         while($row = mysqli_fetch_assoc($result)):
   ?>
            <div class="card-wrap">
               <div class="item-card">
                  <div class="card-line">
                     <div class="item-name">
                        <a href="item.php?item=<?php echo $row["id"]; ?>"><b><?php echo $row["name"]; ?></b></a>
                     </div>
                     <div class="item-time"><?php echo $row["ordertime"]; ?></div>
                  </div>
                  <div class="item-img">
                     <a href="item.php?item=<?php echo $row["id"]; ?>"><img src="<?php echo $row["img"]; ?>" alt=""></a>
                  </div>
                  <div class="item-desc"><?php echo $row["description"]; ?></div>
                  <div class="card-line card-line-bottom">
                     <div class="item-price"><?php echo $row["cost"]; ?> грн.</div>
                     <div class="plus-one"></div>
                     <div class="item-button"><a href="javascript:void(0);" data-id="<?php echo $row["id"]; ?>" onclick=addToCart(this);>В корзину</a></div>
                  </div>
               </div>
            </div>
   <?php endwhile; ?>

         </div>
      </div>
      <!-- popular END -->
      <!-- Info-block -->
      <div class="section info">
         <h2>Исключительно ручная работа</h2>
         <div class="info-wrap">
            <div class="info-left">
               <img src="/images/handmade-transparent.png" alt="">
            </div>
            <div class="info-right">
               <ul>
                  <li><i class="fas fa-check"></i><span>Натуральные материалы</span></li>
                  <li><i class="fas fa-check"></i><span>Индивидуальный подход</span></li>
                  <li><i class="fas fa-check"></i><span>Отлично подходит для подарков</span></li>
                  <li><i class="fas fa-check"></i><span>Полностью безопасно для детей</li>
                  <li><i class="fas fa-check"></i><span>Лучшие цены</span></li>
                  <li><i class="fas fa-check"></i><span>Сделано с любовью</span></li>
               </ul>
               <h4>Переходите в каталог, заказывайте и убедитесь лично!</h4><br>
               <a href="catalog.php" class="slider-catalog-button">Перейти в каталог</a>
            </div>
         </div>
      </div>
      <!-- Info-block END -->
      <!-- new ones -->
      <div class="section new">
         <h2>Новые поступления:</h2>
         <div class="item-cards">
         <?php 
         $sql = "SELECT * FROM goods ORDER BY id DESC LIMIT 4";
         $result = mysqli_query($conn, $sql);
         while($row = mysqli_fetch_assoc($result)):
         ?>
            <div class="card-wrap">
               <div class="item-card">
                  <div class="card-line">
                     <div class="item-name">
                           <a href="item.php?item=<?php echo $row["id"]; ?>"><b><?php echo $row["name"]; ?></b></a>
                     </div>
                     <div class="item-time"><?php echo $row["ordertime"]; ?></div>
                  </div>
                  <div class="item-img">
                     <a href="item.php?item=<?php echo $row["id"]; ?>"><img src="<?php echo $row["img"]; ?>" alt=""></a>
                  </div>
                  <div class="item-desc"><?php echo $row["description"]; ?></div>
                  <div class="card-line card-line-bottom">
                     <div class="item-price"><?php echo $row["cost"]; ?> грн.</div>
                     <div class="plus-one"></div>
                     <div class="item-button"><a href="javascript:void(0);" data-id="<?php echo $row["id"]; ?>" onclick=addToCart(this);>В корзину</a></div>
                  </div>
               </div>
            </div>
         <?php endwhile; ?>
         </div>
      </div>
      <!-- new ones END -->

      <!-- questions -->
      <div class="questions-wrapper">
         <?php require_once "questionsform.php";?>
      </div>
      <!-- questions END -->
   </div>
   <!-- wrapper END -->
   <!-- footer -->
   <?php require_once "footer.php";?>
   <!-- footer END -->
   <script src="js/jquery-3.6.0.min.js"></script>
   <script src="js/jquery.maskedinput.min.js"></script>
   <script src="js/main.js"></script>
   <script src="js/slider.js"></script>
</body>
</html>