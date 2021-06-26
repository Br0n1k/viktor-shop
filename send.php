<?php
   $name = $_POST['name'];
   $connectType = $_POST['connectType'];
   $connectData = $_POST['connectData'];
   $someText = ' ';
   $someText = $_POST['someText'];

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

   $message = "<p><b>Пришла заявка с сайта бантиков:</b></p>
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

