<?php
session_start();
    require_once("partials/header.php");
    require_once "classes/Cart.php";
    require_once("classes/User.php");
    require_once("classes/Payment.php");

    if ((isset($_SESSION["user_id"]) && isset($_SESSION["order_ref_no"]))) {

         $user_id = ($_SESSION["user_id"]);
         $ref = $_SESSION["order_ref_no"];
         $pay = new Payment();
        $payment = $pay->paystack_verify($ref);

    
}     
        
?>

<div class="container  col-md-10" style="background-color: white;" >
<div class="row">
    <div class="col">
        <?php echo require_once("partials/user_menu.php");?>
    </div>
</div>
    <?php
         $id = $_SESSION["user_id"];
         $data = $user->get_user($id);
       
            if (!empty($data)) {
    ?>
    <div class="content float-start">
          <p class="mb-5 "><?php echo $data["user_fname"] . " " . $data["user_lname"]?></p>
    </div>
            <table class="table">
                <thead>
                      <tr>
                        <th>Receipt No</th>
                        <th>Order Date</th>
                        <th>Order Status</th>
                        <th>Total Amount Paid</th>
                        <th>Payment Status</th>
                        <th>Delivery Date</th>
                      </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $payment->data->reference ?></td>
                        <td><?php echo $payment->data->paid_at ?></td>
                        <td class="text-success"><?php echo $payment->data->status ?></td>
                        <td class="fw-bold">&#8358;<?php echo number_format($payment->data->amount, 2)?></td>
                        <td>
                            <?php
                                if($payment->status == 1){
                                    echo "<div class='text-success'>PAID </div>";
                                }else{
                                    echo "<div class='text-danger'> FAILED </div>";
                                }
                            ?>
                        </td>
                        <td><?php echo date("Y-m-d", strtotime('+3 days'))?></td>
                    </tr>
                </tbody>
            </table>
      </div>
<?php
    }
   
?>


<?php
  require("partials/footer.php");
?>
