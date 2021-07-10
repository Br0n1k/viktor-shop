<?php 
   session_start();
   $entered_login = $_POST['login'];
   $entered_password = $_POST['pass'];

   require_once "../connect.php";

    
   $sql = "SELECT * FROM admins WHERE login = '$entered_login'";
   $result = mysqli_query($conn, $sql);
   while($row = mysqli_fetch_assoc($result)){
      $adm_login = $row['login'];
      $adm_pass = $row['password'];
   }

   if($adm_login){
      if(md5($entered_password) === $adm_pass){
         $_SESSION['is_admin'] = 1;
         $_SESSION['username'] = $adm_login;

         echo "ACCESS GRANTED<br>PERMISSION LEVEL: ULTIMATE";
         echo 
            '<script>
               setTimeout(
               function timer(){
                  location="index.php";
               },
                  2000
               );
            </script>';
      }
      else{
         echo "Неверный пароль, грязный хакерок, не зайдешь.";
         echo 
            '<script>
               setTimeout(
               function timer(){
                  location="index.php";
               },
                  3000
               );
            </script>';
      }
   }
   else{
      echo "Такого агента в матрице не найдено.";
   }

?>