<?php

    error_reporting(E_ALL);
    session_start();
    require_once("../classes/utilities.php");
    require_once("../classes/Product.php");

    if($_POST && isset($_POST["btn_upload"]) && $_FILES["prod_img"]["error"] == 0){
        $prod_name =sanitizer( $_POST["name"]);
        $prod_cate = sanitizer($_POST["category"]);
        $prod_descrip =sanitizer( $_POST["desc"]);
        $prod_status = sanitizer($_POST["status"]);
        $prod_img = $_FILES["prod_img"];
        $prod_amount = sanitizer($_POST["price"]);

        $resp = $product->add_product($prod_name, $prod_descrip, $prod_img, $prod_status, $prod_amount, $prod_cate);
        if($resp){
            $_SESSION["success_msg"] = "Product added successfully";
            header("location:../allproduct.php");
            exit();
        }else{
            $_SESSION["errormessage"] = "Upload Failed!";
            header("location:../addproduct.php");
            exit();
        }

    }else{
        $_SESSION["errormessage"] = "Upload Failed!";
        header("location:../addproduct.php");
        exit();
    }


?>