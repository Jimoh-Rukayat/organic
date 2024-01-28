<?php
    session_start();
    error_reporting(E_ALL);
    require_once("../classes/utilities.php");
    require_once("../classes/Product.php");

if ($_POST && isset($_POST["btn_edit"])) {
    
    if(isset($_GET["edit"])){
        $prod_id= $_GET["edit"];
    }

    $prod_id =  $_POST["update_prod"];
    $prod_name = sanitizer($_POST["prod_name"]);
    $prod_descrip =sanitizer( $_POST["desc"]);
    $prod_image_name = $_FILES["prod_img"]['name'];  
    $prod_image_tmp = $_FILES["prod_img"]['tmp_name'];
    $prod_image_type = $_FILES["prod_img"]['type'];
    $prod_image_size = $_FILES["prod_img"]['size'];
    $unique_name = "prod" . "_" . time() . "_" . uniqid() . "_" . $prod_image_name;
    $destination = "../../uploads/" . $unique_name;
    $prod_status = $_POST["prod_status"];
    $prod_amount = sanitizer($_POST["price"]);
    $prod_cate = $_POST["category"];

    $prod_img =move_uploaded_file($prod_image_tmp, $destination);
    
    if($prod_img){
        $response = $product->edit_product($prod_name, $prod_descrip, $unique_name, $prod_status, $prod_amount, $prod_cate, $prod_id);

        if ($response) {
            $_SESSION["success_msg"] = "Product updated successfully";
            header("location:../allproduct.php");
            exit();
        } else {
            $_SESSION["errormessage"] = "Update Failed!";
            header("location:../edit_prod.php");
            exit();
        }
    }else{
        $old_img = $product->get_product_byID($prod_id)['prod_image'];
        $unique_name = $old_img;

        $response = $product->edit_product($prod_name, $prod_descrip, $unique_name, $prod_status, $prod_amount, $prod_cate, $prod_id);
        if ($response) {
            $_SESSION["success_msg"] = "Product updated successfully";
            header("location:../allproduct.php");
            exit();
        } else {
            $_SESSION["errormessage"] = "Update Failed!";
            header("location:../edit_prod.php");
            exit();
        }
    }
       
}else {
    $_SESSION["errormessage"] = "Update Failed!";
    header("location:../edit_prod.php");
    exit();
}
?>
