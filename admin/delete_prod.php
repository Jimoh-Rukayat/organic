<?php
    require_once("classes/Product.php");

    if(isset($_POST["delete"])){

        $prod_id = $_POST["del_prod"];

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