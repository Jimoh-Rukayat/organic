<?php
    
    session_start();
    error_reporting(E_ALL);
    require_once("../classes/Order.php");
    require_once("../classes/Payment.php");
    require_once("../classes/Cart.php");
   
    if($_POST && isset($_SESSION["order_ref_no"])){
        
       
    
        $order = new Order();
        $order_details = $order->get_order_details($_SESSION["order_ref_no"]);

        $payment = new Payment();

        $response = $payment->paystack_initialize($order_details["order_total_amount"], $order_details["user_email"], $order_details["order_ref_no"]);
       
            $cart = new Cart();
            $user_id = $_SESSION["user_id"];
            if($response && $response->status == 1){
             $res = $cart->delete_allcart_items($user_id);
            $paymentpage = $response->data->authorization_url;
            header("location: $paymentpage");
             exit();
        }

        $response = $payment->paystack_verify($_SESSION['order_ref_no']);

        if(isset($response) && $response->status==1){
            
           $actual_amount_deducted_inkobo = $response->data->amount;
            $actual_response_frm_paystack = $response->data->gateway_response;
            $timepaid = $response->data->paid_at;
            $status = 'Paid';
            // $pay->update_transaction($actual_amount_deducted_inkobo,$actual_response_frm_paystack,$timepaid,$status);
           
        }else{
            $status = 'Failed'; 
            // $pay->update_transaction($actual_amount_deducted_inkobo,$actual_response_frm_paystack,$timepaid,$status);
        }
        //when you are done, you can redirect the user to the dashboard
        $_SESSION['userfeedback'] = "Inform the user of the transaction status";
       

    }else{
        header("location:../cart.php");
    }

?>
