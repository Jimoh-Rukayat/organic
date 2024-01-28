<?php
    session_start();
    require_once("partials/header.php");
    require_once("classes/User.php");
    require_once "classes/Order.php";

   
        
        $order = new Order();
        $orders = $order->get_order_details($_SESSION["order_ref_no"]);
        // print_r($orders);
        
    

   
   
   
?>


<div class="container  col-md-10 py-5" style="background-color: white;" >
<p>Pls confirm your payment details below</p>
<div class="content">
  <table class="table px-5">
    <tr>
        <th>Name:</th>
        <td><?php echo $orders["user_fullname"]?></td>
    </tr>
    <tr>
        <th>Address:</th>
        <td><?php echo $orders["order_shipping_address"]?></td>
    </tr>
    <tr>
        <th>Phone No:</th>
        <td><?php echo $orders["user_phone"]?></td>
    </tr>
    <tr>
        <th>Receipt No:</th>
        <td><?php echo $orders["order_ref_no"]?></td>
    </tr>
    <tr>
        <th>Total Amount:</th>
        <td>&#8358;<?php echo $orders["order_total_amount"]?></td>
    </tr>
    <tr>
       
            <td colspan="2">
               <form action="process/process_payment.php" method="post">
                    <input class="btn btn-success noround col-1 mt-3" id="btnconfirm" name="btnconfirm" type="submit" value="Pay Now">
                    <!-- <button class="btn btn-success noround" name="btnconfirm">Pay Now</button> -->
               </form> 
            </td>
        
    </tr>
 </table>
 </div>


</div>


<?php
  require("partials/footer.php");
?>
