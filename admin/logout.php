<?php
   session_start();
   unset($_SESSION['is_admin']);
   unset($_SESSION['username']);
   header('Location: index.php');
?>