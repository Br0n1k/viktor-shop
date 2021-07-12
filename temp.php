<?php
   $name = $_POST['name'];
   $connectType = $_POST['connectType'];
   $connectData = $_POST['connectData'];
   $someText = ' ';
   $someText = $_POST['someText'];
   $arrOut = $_POST['arrOut'];
   $sum = $_POST['sum'];


   for ($i=0; $i < count($arrOut); $i++) { 
      $fromArrOut .= "<p><b>Что заказали: </b> $arrOut[$i]</p>";
   }
   

   
   echo($fromArrOut);
   echo($arrOut);