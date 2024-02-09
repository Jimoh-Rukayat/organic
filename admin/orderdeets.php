<?php
    error_reporting(E_ALL);
    session_start();
    require_once("partials/header.php");
    require_once("admin_guard.php");
    require_once "classes/Order.php";
    require_once "partials/sidebar.php";



    $order = new Order();
    $orders = $order->get_order_details();


?>
            <div class="col-md-10">
                <h2>Customer Orders</h2>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php" style="text-decoration: none" class="text-dark">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="allusers.php">All Users</a></li>
                    <li class="breadcrumb-item active">All Orders</li>
                </ol>
                <table class="table table-striped table-hover table-success" width="100%" cellpadding="10" cellspacing="1">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Order Qty</th>
                            <th>Order Amount</th>
                            <th>Order Status</th>
                            <th>Order Date</th>
                            <th>Customer ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($orders as $ord){
                          
                        ?>
                        <tr>
                            <td><?php echo $ord["prod_name"]?></td>
                            <td><?php echo $ord["order_qty"]?></td>
                            <td>&#8358;<?php echo $ord["order_qty"] * $ord["order_amount"] ?></td>
                            <td>
                                <?php
                                    if($ord['pay_status'] == 1){
                                         echo "PAID";
                                        }else{
                                            echo "NOT PAID";
                                        } 
                                    ?>
                                </td>
                            <td><?php echo $ord["order_date"]?></td>
                            <td><?php echo $ord["user_id"]?></td>                   
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