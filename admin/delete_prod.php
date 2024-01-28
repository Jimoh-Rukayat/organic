<?php
    require_once("classes/Product.php");

    if(isset($_GET["delete"])){
        $prod_id = $_GET["delete"];

        $response = $product->delete_product($prod_id);
        if($response){
            header("location:allproduct.php");
            exit();
        }else{
            $_SESSION["errormessage"] = "Failed to delete";
            header("location:allproduct.php");
            exit();
        }
    }
    

   




?>