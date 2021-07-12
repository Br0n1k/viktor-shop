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
   
   $to = 'bronick@bigmir.net';
   $subject = 'Заявка с сайта';
   

   if($connectType == 'phone'){
      $connectTypeExport = 'Телефон';
   }
   elseif($connectType == 'viber'){
      $connectTypeExport = 'Viber';
   }
   elseif($connectType == 'telegram'){
      $connectTypeExport = 'Telegram';
   }
   elseif($connectType == 'email'){
      $connectTypeExport = 'Электронная почта';
   }

   if($someText == ' ' || !$someText || $someText == none || $someText == undefined){
      $someTextExport = 'В добавочном поле пусто';
   }
   else{
      $someTextExport = $someText;
   }

   $message = "<p><b>Пришла заявка из корзины с сайта бантиков:</b></p>
               $fromArrOut
               <p><b>Стоимость (грн.): </b> $sum</p>
               <p><b>От (имя): </b> $name</p>
               <p><b>Средство связи: </b> $connectTypeExport</p>
               <p><b>$connectTypeExport человечка: </b> $connectData</p>
               <p><b>Из добавочного поля: </b> $someTextExport</p>";

   $headers  = "Content-type: text/html; charset=\"utf-8\" \r\n"; 
   $headers  .= "From: Bantiki \r\n";
   
   if(mail($to, $subject, $message, $headers)){
      echo true;
   }
   else{
      echo false;
   }

?>

