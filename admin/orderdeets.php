<?php
    error_reporting(E_ALL);
    session_start();
    require_once("partials/header.php");
    require_once("admin_guard.php");
    require_once "classes/Cart.php";
    require_once "partials/sidebar.php";



    $cart = new Cart();
    $carts = $cart->fetchAllCartItems();
   

   

?>
            <div class="col-md-10">
                <h2>Customer Orders</h2>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php" style="text-decoration: none" class="text-dark">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="allusers.php">All Users</a></li>
                    <li class="breadcrumb-item active">All Orders</li>
                </ol>
                <table class="table table-striped table-hover" width="100%" cellpadding="10" cellspacing="1">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Qty</th>
                            <th>Amount</th>
                            <th>Order Status</th>
                            <th>Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($carts as $u){
                        ?>
                            <tr>
                               <td><?php echo $u["prod_name"]?></td>
                                <td><?php echo $u["prod_qty"]?></td>
                                <td>&#8358;<?php echo $u["prod_qty"] * $u["prod_amt"] ?></td>
                                <!-- <td><?php echo $u["user_id"]?></td> -->
                                <td><?php echo $u["date_added"]?></td>
                               
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