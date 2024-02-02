<?php
    error_reporting(E_ALL);
    require_once "../classes/Order.php";

    if($_POST && isset($_POST['chkout_btn'])){
       
       $prod_id = $_POST['prod_id'];
       $ord_amt = $_POST['amount'];
       $ord_qty = $_POST['prod_qty'];


        $order = new Order();
        $res = $order->user_order_details($prod_id, $ord_amt, $ord_qty);
       if($res){
            header("location:../checkout.php");
       }


    }else{
        header("location:../cart.php");
        exit();
    }











?>