<?php
    session_start();
    error_reporting(E_ALL);
    require_once "../classes/Order.php";
    require_once "../classes/Cart.php";

    $cart = new Cart();
    $order = new Order();
    $orders = $order->get_order_details($_SESSION["order_ref_no"]);
    $carts = $cart->fetchAllCartItems($_SESSION["user_id"]);
   
    
    if(isset($_POST['chkout_btn'])){
       
       foreach ($carts as $cartItem) {
        $prod_id = $cartItem['prod_id'];
        $ord_amt = $cartItem['prod_amt'];
        $ord_qty = $cartItem['prod_qty'];
        $ord_id = $orders['order_id'];
       
        $res = $order->user_order_details($prod_id, $ord_amt, $ord_qty, $ord_id);
       if($res){
            header("location:../checkout.php");
       }


    }

    }else{
        header("location:../cart.php");
        exit();
    }







?>