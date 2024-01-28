<?php
    error_reporting(E_ALL);
    session_start();
    require_once("partials/header.php");
    require_once("admin_guard.php");
    require_once "classes/Order.php";
    require_once "partials/sidebar.php";



    $order = new Order();
    $orders = $order->get_all_orders();
    // print_r($orders);

   

?>
            <div class="col-md-10">
                <h2>All Products</h2>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php" style="text-decoration: none" class="text-dark">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="allorders.php">All Users</a></li>
                    <li class="breadcrumb-item active">All Orders</li>
                </ol>
                <table class="table table-striped" width="100%" cellpadding="10" cellspacing="1">
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>Address</th>
                            <th>State</th>
                            <th>Amount Paid</th>
                            <th>Phone No</th>
                            <th>Reference No</th>
                            <th>Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                foreach($orders as $u){
                                
                        ?>
                            <tr>
                                <td><?php echo $u["user_id"]?></td>
                                <td><?php echo $u["order_shipping_address"]?></td>
                                <td><?php echo $u["state_name"] ?></td>
                                <td>&#8358;<?php echo $u["order_total_amount"]?></td>
                                <td><?php echo $u["user_phone"]?></td>
                                <td><?php echo $u["order_ref_no"]?></td>
                                <td><?php echo $u["order_date"]?></td>
                            </tr>
                        <?php
                            }
                        ?>
        
                    </tbody>
                </table>
            </div>
     </div>
</body>
<?php
    require_once("partials/footer.php");
 ?>