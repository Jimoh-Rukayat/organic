
<?php
    require_once("classes/Cart.php");
    
    if(isset($_POST["delete-item"])){

        $cart_id = $_POST["delete_cart"];


        $cart = new Cart();
        $response = $cart->remove_cart_items($cart_id);
        if($response){
            header("location:cart.php");
            exit();
        }else{
            $_SESSION["errormessage"] = "Failed to delete";
            header("location:cart.php");
            exit();
        }
    }
   




?>