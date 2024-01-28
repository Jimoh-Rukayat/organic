<?php
session_start();
error_reporting(E_ALL);
require_once "../classes/Cart.php";



if(isset($_POST["prod_qty"])){
    $prod_qty = $_POST["prod_qty"];
    $prod_amt = $_POST["prod_amt"];
    $prod_id = $_POST["prod_id"];

    $total_price = $prod_qty * $prod_amt;

   $cart = new Cart();
    $response = $cart->updateProductQuantity($prod_id, $prod_qty, $prod_amt);

    if($response){
        echo json_encode(array("success" => true, "message" => "Quantity updated successfully"));
    }else{
        echo json_encode(array("success" => false, "message" => "Failed to update quantity"));
    }

}

?>