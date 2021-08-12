<?php
    require_once "../connect.php";

    //Website static elements
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

    //Categories
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

    //Goods
    elseif (isset($_POST["good_upd"])){
        // var_dump($_FILES) . "</br>";

        $id = $_POST["good_upd"];
        $name = $_POST["ru_name"];
        $desc = $_POST["description"];
        $cost = $_POST["cost"];

        $bigimg = $_FILES["bigimg"];

        $bigimg_name = $_FILES["bigimg"]["name"];
        $bigimg_folder = pathinfo($bigimg_name, PATHINFO_FILENAME);

        if($bigimg_name){
            echo "FILE HERE!";




        }
        for ($i=1; $i <= 4; $i++) { 
            if($_FILES["img{$i}"]["name"] != ""){
                $img = $_FILES["img{$i}"];
                $path = "../images/goods/" . $foldername . "/" . time() . $img["name"];
                move_uploaded_file($img["tmp_name"], $path);
                $imgpath = "/images/goods/" . $foldername . "/" . time() . $img["name"];
                $imgarr[] = $imgpath;
            }
            else{
                $imgarr[] = "";
            }
        }





        // echo $bigimg_name . "<br>";
        // echo $bigimg_folder . "<br>";

        // echo $id . "<br>";




    }
















    mysqli_close($conn);
    
?>