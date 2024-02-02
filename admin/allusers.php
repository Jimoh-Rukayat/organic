<?php
    error_reporting(E_ALL);
    session_start();
    require_once("partials/header.php");
    require_once("admin_guard.php");
    require_once "classes/User.php";
    require_once "partials/sidebar.php";



    $user = new User();
    $users = $user->get_all_users();
    // echo "<pre>";
    //  print_r($users);
    //  echo "</pre>";

   

?>
            <div class="col-md-10">
                <h2>Customer Details</h2>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php" style="text-decoration: none" class="text-dark">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="#">All Customers</a></li>
                </ol>
                <table class="table table-striped" width="100%" cellpadding="10" cellspacing="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Adderss</th>
                            <th>State</th>
                            <th>Phone Number</th>
                            <th>Date Registered</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($users as $u){
                            
                        ?>
                            <tr>
                                <td><?php echo $u["user_id"]?></td>
                                <td><?php echo $u["user_fname"]?></td>
                                <td><?php echo $u["user_lname"] ?></td>
                                <td><?php echo $u["user_email"]?></td>
                                <td><?php echo $u["order_shipping_address"]?></td>
                                <td><?php echo $u["state_name"]?></td>
                                <td><?php echo $u["user_phone"]?></td>
                                <td><?php echo $u["date_reg"]?></td>
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