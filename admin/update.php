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
        $id = $_POST["id"];

        if($id != 1){
            $sql_oldname = mysqli_query($conn, "SELECT `name` FROM categories WHERE `id` = '$id'");
            while($oldname_result = mysqli_fetch_assoc($sql_oldname)){
                $oldname = $oldname_result["name"];
            }

            $sql_catupdate = "UPDATE `goods` SET `category` = '$name' WHERE `category` = '$oldname'";
            mysqli_query($conn, $sql_catupdate);

            $sql = "UPDATE `categories` SET `name` = '$name', `ru_name` = '$ru_name', `description` = '$desc' WHERE `id` = '$id'";
            mysqli_query($conn, $sql);
        }
        else{
            $sql = "UPDATE `categories` SET `ru_name` = '$ru_name', `description` = '$desc' WHERE `id` = '$id'";
            mysqli_query($conn, $sql);
        }

        

        header('Location: /admin/categories.php');
    }
    elseif (isset($_POST["cat_del"])){
        $id = $_POST["id"];

        if($id != 1){
            $sql_oldname = mysqli_query($conn, "SELECT `name` FROM categories WHERE `id` = '$id'");
            while($oldname_result = mysqli_fetch_assoc($sql_oldname)){
                $oldname = $oldname_result["name"];
            }
            $sql_catupdate = "UPDATE `goods` SET `category` = '99else' WHERE `category` = '$oldname'";
            mysqli_query($conn, $sql_catupdate);

            $sql = "DELETE FROM `categories` WHERE `id` = '$id'";
            mysqli_query($conn, $sql);
        }

        header('Location: /admin/categories.php');
    }









    mysqli_close($conn);
    
?>