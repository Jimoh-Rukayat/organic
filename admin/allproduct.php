<?php
    error_reporting(E_ALL);
    session_start();
    require_once("partials/header.php");
    require_once("partials/sidebar.php");
    require_once("admin_guard.php");
    require_once("classes/Product.php");

   // $prod = $product->get_product_byID( $_SESSION["prod_id"]);
    // print_r($prod);
    // die();
    $products = $product->get_product();

    // echo "<pre>";
    // print_r($products);
    // echo "</pre>";

?>
            <div class="col-md-10">
                <h2>All Products</h2>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.php" style="text-decoration: none" class="text-dark">Dashboard</a></li>
                    <li class="breadcrumb-item active">All Products</li>
                    <li class="breadcrumb-item active"><a href="addproduct.php">Add Product</a></li>
                </ol>
                <table class="table table-striped" width="100%" cellpadding="10" cellspacing="1">
                    <?php
                        if(isset($_SESSION["success_msg"])){
                            echo $_SESSION["success_msg"] = "<div class= 'alert alert-success'>" . $_SESSION["success_msg"] . "</div>";
                            unset($_SESSION["success_msg"]);
                        }

                    ?>
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Product Category</th>
                            <th>Product Image</th>
                            <th>Product Status</th>
                            <th>Product Amount</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($products as $prod){
                                // print_r($prod);
                                // die();
                        ?>
                            <tr>
                                <td><?php echo $prod["prod_name"]?></td>
                                <td><?php echo $prod["prod_description"]?></td>
                                <td><?php echo $prod["cat_name"]?></td>
                                <td><img src="../uploads/<?php echo $prod["prod_image"]?>" alt="" width="80" style="border-radius: 100px"></td>
                                <td><?php echo $prod["prod_status"] == "1" ? "Available" : "Not Available"?></td>
                                <td>&#8358;<?php echo $prod["prod_amount"]?>/kg</td>
                                <td><a href="edit_prod.php?edit=<?php echo $prod['prod_id']?>"><button class="btn btn-warning btn-sm">Edit</button></a></td>
                                <td><a href="delete_prod.php?delete=<?php echo $prod['prod_id']?>"><button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');" id="delete">Delete</button></a></td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <footer>
            <div class="row">
                <div class="col-md-2 bg-light">
                  <p>Admin Login</p>
                </div>
                <div class="col-md-10">
                    <hr style="border: 2px dotted;">
                    <span class="mt-3">Copyright &copy; Tfarms. All Rights Reserved.</span>
                    <span class="text-end"><?php  echo date("Y")?></span>
                </div>
            </div>
        </footer>
    </div>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/script/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
           
        })
    </script>
</body>