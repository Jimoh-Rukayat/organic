<?php
    error_reporting(E_ALL);
    session_start();
  
    require_once("partials/header.php");
    require_once("partials/sidebar.php");
    require_once("admin_guard.php");
    require_once("classes/Category.php");

    $categories = $cat-> get_category();

    // echo"<pre>";
    // print_r($categories);
    // echo"</pre>";

?>

            <div class="col-md-10">
                <h2>Add Products</h2>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active"><a href="allproduct.php">All Products</a></li>
                    <li class="breadcrumb-item active">Add Product</li>
                </ol>
                <form action="process/addprod_process.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="select">Select</option>
                        <?php
                            foreach ($categories as $category){
                        ?>
                            <option value="<?php echo $category["cat_id"]?>"><?php echo $category["cat_name"]?></option>
                        <?php
                            }
                        ?>
                           
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-check-label" for="text">Description</label>
                        <textarea name="desc" id="text" cols="30" rows="10" class="form-control"></textarea> 
                    </div>
                    <div class="mb-3">
                        <label for="status">Product Status</label>
                        <div class="form-check">
                            <input type="radio" name="status" class="form-check-input" id="exampleRadio1" value="1">
                            <label class="form-check-label" for="exampleRadio1">Availbale</label>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="radio" name="status" class="form-check-input" id="exampleRadio2"  value="0">
                            <label class="form-check-label" for="exampleRadio2">Not Available</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="prodimg">Upload Product Image</label>
                        <input type="file" class="form-control" id="prodimg" name="prod_img">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="price">Product Price</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="btn_upload" class="btn btn-success">Upload</button>
                    </div>
               </form>
            </div>
        </div>
        <footer>
            <div class="row bg-light">
                <div class="col-md-2">
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
</body>
</html>