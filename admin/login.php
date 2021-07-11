<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login page</title>
   <link rel="stylesheet" href="admin.css">
</head>
<body>
   <?php
      if($_SESSION['is_admin'] == 1){
         header('Location: /index.php');
      }
   ?>
      <div class="login-wrapper">
         <div class="login-window">
            <form action="logincheck.php" method="POST">
               <label for="login">Login:</label>
               <input type="text" name="login"><br>
               <label for="pass">Password:</label>
               <input type="password" name="pass"><br>
               <button type="submit">Enter the matrix</button>
            </form>
         </div>
      </div>
      




</body>
</html>