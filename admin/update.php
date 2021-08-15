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
        $id = $_POST["good_upd"];
        $name = $_POST["ru_name"];
        $desc = $_POST["description"];
        $cost = $_POST["cost"];
        $bigimg = $_FILES["bigimg"];
        $bigimg_name = $_FILES["bigimg"]["name"];

        $sql_old = mysqli_query($conn, "SELECT * FROM `goods` WHERE `id` = '$id'");
        $old_good = mysqli_fetch_assoc($sql_old);
        $old_bigimg = $old_good["img"];
        $old_bigimg_folder = pathinfo($old_bigimg, PATHINFO_DIRNAME);
        
        if($bigimg_name){
            $path = ".." . $old_bigimg_folder . "/" . time() . $bigimg_name;
            $path_db = $old_bigimg_folder . "/" . time() . $bigimg_name;
            move_uploaded_file($bigimg["tmp_name"], $path);
            mysqli_query($conn, "UPDATE `goods` SET `img` = '$path_db' WHERE `id` = '$id'");
            unlink(".." . $old_bigimg);
        }

        for ($i=1; $i <= 4; $i++) { 
            if($_FILES["img{$i}"]["name"] != ""){
                $old_img = $old_good["img{$i}"];
                $img = $_FILES["img{$i}"];
                $path = ".." . $old_bigimg_folder . "/" . time() . $img["name"];
                $imgpath_db = $old_bigimg_folder . "/" . time() . $img["name"];
                move_uploaded_file($img["tmp_name"], $path);
                mysqli_query($conn, "UPDATE `goods` SET `img{$i}` = '$imgpath_db' WHERE `id` = '$id'");
                if($old_img != ""){
                    unlink(".." . $old_img);
                }
            }
        }

        

        header('Location: /admin/goods.php');






        // echo $bigimg_name . "<br>";
        // echo $bigimg_folder . "<br>";

        // echo $id . "<br>";




    }
















    mysqli_close($conn);
    
?>