<?php
   require_once "connect.php";


   $data = $_POST["ids"];
   // json_encode($data);
   


   $sql = "SELECT * FROM goods WHERE id IN (".implode(',',$data).")";
   $result = mysqli_query($conn, $sql);

   // $out = array();

   while($row = mysqli_fetch_assoc($result)){
      $out[$row["id"]]["name"] = $row["name"];
      $out[$row["id"]]["img"] = $row["img"];
      $out[$row["id"]]["cost"] = $row["cost"];
   }
      echo json_encode($out);




?>