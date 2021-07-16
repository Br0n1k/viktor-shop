<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Корзина</title>
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
   <div class="wrapper cart-wrapper">
      <h2>Ваши товары:</h2>
      <div class="section">
         <div class="cart-table">
            <div class="cart-out"></div><br><br>
            <div class="cart-sum-out"></div>
         </div>
         
         <!-- form -->
         <div class="cart-order">
            <div class="section questions">
                  <div class="questions-inside-cart">
                     <form class="questions-form cart" method="POST">
                        <h4>Укажите как с Вами связаться</h4>
                        <label for="name">Ваше имя</label>
                        <input type="text" name="name" id="name" placeholder="Джон Снег" required><br>
                        <label for="chooser">Как с Вами связаться</label>
                        <div class="form-choose">
                           <div class="choose-content">
                              <a href="javascript:void(0);" data-value="phone" id="chooser" class="choose-click"><i class="choose-click fas fa-phone"></i> Телефон</a>
                              <div class="choose-row">
                                 <a href="javascript:void(0);" class="choose-not-click choose-viber"><i class="choose-not-click choose-viber fab fa-viber"></i> Viber</a>
                                 <a href="javascript:void(0);" class="choose-not-click choose-telegram"><i class="choose-not-click choose-telegram fab fa-telegram-plane"></i> Telegram</a>
                                 <a href="javascript:void(0);" class="choose-not-click choose-email"><i class="choose-not-click choose-email fas fa-at"></i> E-mail</a>
                              </div>
                           </div>
                        </div>
                        <br>
                        <div class="variant">
                           <label for="tel">Введите телефон:</label>
                           <input type="tel" name="tel" id="tel" placeholder="+38(___)___-__-__" maxlength="18" required>
                        </div>
                        <br>
                        <label for="some">Хотите добавить что-то еще?</label>
                        <textarea rows="3" name="some" id="some" placeholder="...и большую колу, пожалуйста :)"></textarea><br>
                        <button type="submit">Отправить</button>
                     </form>
                  </div>
               </div>
            
            <!-- form success -->
            <div class="success-form-shadow">
               <div class="success-form">
                  <h2>Данные успешно отправлены!</h2>
                  <h3>С Вами свяжутся в ближайшее время!</h3>
                  <i class="fas fa-clipboard-check"></i>
               </div>
            </div>
            <!-- form success END --></div>

      </div>



   </div>
   <!-- wrapper END -->
   <?php require_once "connect.php"; 
      $sql_from_vars = "SELECT * FROM variables";
      $variables = mysqli_query($conn, $sql_from_vars);
      
      $vars = [];

      while($var = mysqli_fetch_assoc($variables)){
         $vars[$var["title"]] = $var["value"];
      }
   ?>
   <!-- footer -->
   <?php require_once "footer.php";?>
   <!-- footer END -->
   <script src="js/jquery-3.6.0.min.js"></script>
   <script src="js/jquery.maskedinput.min.js"></script>
   <script src="js/main.js"></script>
   <script src="js/cart.js"></script>
</body>
</html>