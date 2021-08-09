<?php
    require_once "../connect.php";

    if(isset($_POST["variables"])){
            $title = $_POST["title"];
            $value = $_POST["value"];

        $sql = "UPDATE `variables` SET `value` = '$value' WHERE `title` = '$title'";
        mysqli_query($conn, $sql);
        header('Location: /admin/index.php');
    }
    elseif (isset($_POST["favorite"])) {
        $fav = $_POST["favorite"];
        $favid = $_POST["favid"];

        $sql = "UPDATE `goods` SET `isfavorite` = NULL WHERE `isfavorite` = '$fav'";
        mysqli_query($conn, $sql);
        $sql = "UPDATE `goods` SET `isfavorite` = '$fav' WHERE `id` = '$favid'";
        mysqli_query($conn, $sql);
        header('Location: /admin/index.php');
    }
    elseif (isset($_POST["cat_upd"])){
        $name = $_POST["name"];
        $ru_name = $_POST["ru_name"];
        $desc = $_POST["desc"];

        $sql = "UPDATE `categories` SET `ru_name` = '$ru_name', `description` = '$desc' WHERE `name` = '$name'";
        mysqli_query($conn, $sql);
        header('Location: /admin/categories.php');


    }










    mysqli_close($conn);
    
?>