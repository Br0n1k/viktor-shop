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
   <div class="wrapper">
      <div class="section item">
         <?php require_once "connect.php"; ?>
         <?php
            if(isset ($_GET["item"])){
               $id = $_GET["item"];

               $sql = "SELECT * FROM goods WHERE id = '$id'";
               $result = mysqli_query($conn, $sql);
            }
         ?>
         <?php 
            while($row = mysqli_fetch_assoc($result)): ?>
            
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
               
         <?php endwhile; 
               mysqli_close($conn);
         ?>




      </div>








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
