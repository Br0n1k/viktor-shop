<div class="section bantiki">
   <h2>Бантики:</h2>
   <div class="item-cards cards-catalog">
   <?php require_once "admin/connect.php"; ?>
   <?php 
   $sql = "SELECT * FROM goods WHERE category = 'bantik' ORDER BY id DESC";
   $result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)):
   ?>
      <div class="card-wrap">
         <div class="item-card">
            <div class="card-line">
               <div class="item-name"><?php echo $row["name"]; ?></div>
               <div class="item-time"><?php echo $row["ordertime"]; ?></div>
            </div>
            <div class="item-img"><img src="<?php echo $row["img"]; ?>" alt=""></div>
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


<div class="section obruchi">
   <h2>Обручи:</h2>
   <div class="item-cards cards-catalog">
   <?php 
   $sql = "SELECT * FROM goods WHERE category = 'obruch' ORDER BY id DESC";
   $result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)):
   ?>
      <div class="card-wrap">
         <div class="item-card">
            <div class="card-line">
               <div class="item-name"><?php echo $row["name"]; ?></div>
               <div class="item-time"><?php echo $row["ordertime"]; ?></div>
            </div>
            <div class="item-img"><img src="<?php echo $row["img"]; ?>" alt=""></div>
            <div class="item-desc"><?php echo $row["description"]; ?></div>
            <div class="card-line card-line-bottom">
               <div class="item-price"><?php echo $row["cost"]; ?> грн.</div>
               <div class="plus-one"></div>
               <div class="item-button"><a href="javascript:void(0);" data-id="<?php echo $row["id"]; ?>" onclick=addToCart(this);>В корзину</a></div>
            </div>
         </div>
      </div>
   <?php endwhile; 
   mysqli_close($conn);
   ?>
   </div>
</div>