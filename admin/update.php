<?php
    if(isset($_POST["variables"])){
            $title = $_POST["title"];
            $value = $_POST["value"];

        require_once "../connect.php"; 

        $sql = "UPDATE `variables` SET `value` = '$value' WHERE `title` = '$title'";
        mysqli_query($conn, $sql);
    }
    elseif (isset($_POST["favorite"])) {
        $fav = $_POST["favorite"];
        $favid = $_POST["favid"];

        require_once "../connect.php"; 

        $sql = "UPDATE `goods` SET `isfavorite` = NULL WHERE `isfavorite` = '$fav'";
        mysqli_query($conn, $sql);
        $sql = "UPDATE `goods` SET `isfavorite` = '$fav' WHERE `id` = '$favid'";
        mysqli_query($conn, $sql);
        // var_dump($favid);
        // var_dump($fav);

    }










    mysqli_close($conn);
    header('Location: /admin/index.php');
?>