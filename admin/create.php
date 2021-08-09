<?php
//Good add
if(isset($_POST["goods"])){
    $category = $_POST["category"];
    $name = $_POST["name"];
    $ordertime = $_POST["ordertime"];
    $description = $_POST["description"];
    $cost = $_POST["cost"];
    $bigimg = $_FILES["bigimg"];

    $foldername = pathinfo($bigimg["name"], PATHINFO_FILENAME);
    $imgarr = [];
    $bigimgpath;

    function addImages(){
        global $foldername;
        global $imgarr;
        global $bigimgpath;
        global $bigimg;

        $path = "../images/goods/" . $foldername . "/" . time() . $bigimg["name"];
        move_uploaded_file($bigimg["tmp_name"], $path);
        $bigimgpath = "/images/goods/" . $foldername . "/" . time() . $bigimg["name"];

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

    }

    if(is_dir("../images/goods/" . $foldername)){
        addImages();
    }
    else{
        mkdir("../images/goods/" . $foldername, 0700);
        addImages();
    }

    $img1 = $imgarr[0];
    $img2 = $imgarr[1];
    $img3 = $imgarr[2];
    $img4 = $imgarr[3];

    if($ordertime == "order"){
        $ordertime = "Пiд замовлення";
    }
    elseif($ordertime == "stock"){
        $ordertime = "У наявностi";
    }
    
   require_once "../connect.php"; 

   $sql = "INSERT INTO `goods` (`id`, `category`, `isfavorite`, `name`, `ordertime`, `img`, `img1`, `img2`, `img3`, `img4`, `description`, `cost`) 
   VALUES (NULL, '$category', NULL, '$name', '$ordertime', '$bigimgpath', '$img1', '$img2', '$img3', '$img4', '$description', '$cost')";
   mysqli_query($conn, $sql);

   mysqli_close($conn);
   header('Location: /admin/add.php');
}
//Category add
if(isset($_POST["category"])){
    $cat_en = $_POST["name_en"];
    $cat_ru = $_POST["name"];
    $desc = $_POST["description"];

    require_once "../connect.php"; 
    $sql = "INSERT INTO `categories` (`id`, `name`, `ru_name`, `description`) 
    VALUES (NULL, '$cat_en', '$cat_ru', '$desc')";
    mysqli_query($conn, $sql);

    mysqli_close($conn);
    header('Location: /admin/add.php');
}
   










?>