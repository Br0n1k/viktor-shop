<div class="footer">
   <div class="footer-inside">
      <div class="footer-left">
         <ul>
            <li><a href="/catalog.php">Каталог</a></li>
            <li><a href="/about.html">О нас</a></li>
            <li><a href="/contacts.html">Контакты</a></li>
            <li><a href="/cart.php">Корзина</a></li>
         </ul>
      </div>
      <div class="footer-right">
         <ul>
            <li><a href="<?php echo $vars["viber_link"]; ?>" class="vb-link"><i class="fab fa-viber"></i>Viber</a></li>
            <li><a href="<?php echo $vars["Instagram_link"]; ?>" class="inst-link"><i class="fab fa-instagram"></i>Instagram</a></li>
            <li><a href="<?php echo $vars["facebook_link"]; ?>" class="fb-link"><i class="fab fa-facebook-f"></i>Facebook</a></li>
            <li><a href="<?php echo $vars["vkontakte_link"]; ?>" class="vk-link"><i class="fab fa-vk"></i>Vkontakte</a></li>
         </ul>
      </div>
   </div>
   <div class="footer-copyrights">
      <p>©<?php echo date("Y"); ?> All rights reserved.</p>
   </div>
</div>
<?php mysqli_close($conn); ?>