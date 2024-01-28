<?php
session_start();
error_reporting(E_ALL);
require_once "../classes/Cart.php";
require_once "../classes/Payment.php";

$cart = new Cart();
$payment = new Payment();



 if(isset($_POST["add2cart"]) && isset($_SESSION["user_id"])){
   
    $prod_name = $_POST["name"];
    $prod_image = $_POST["image"];
    $prod_qty = 1;
    $prod_amt = $_POST["amount"];
    $prod_id = $_POST["id"];
    $user_id = $_SESSION["user_id"];

    $res = $cart->get_cart_items($prod_id, $user_id);
    if($res){
        $_SESSION["errormessage"] = "Product already added to cart";
        header("location:../shop.php");
        exit();
    }else{
        $response = $cart->cart_items($prod_image, $prod_name, $prod_qty, $prod_amt, $user_id, $prod_id);
        if($response){
            $_SESSION["success_feedback"] = "Product successfully added to cart";
            header("location:../shop.php");
            exit();
        }   
    }  
 }elseif(isset($_GET["cartItem"]) && $_GET["cartItem"] == "cart_item"){
    
    if(isset($_SESSION["user_id"])){

        $response = $cart->CartItemsCount( $_SESSION["user_id"]);
        if($response){
            echo $response;
        }
    }

    

 }





    
?>


<!-- else{
    header("location:../login.php");
    exit();
 } -->


