<?php
    error_reporting(E_ALL);
    session_start();
    
    require_once("partials/header.php");
    require_once("partials/sidebar.php");
    require_once("classes/Category.php");
    require_once("classes/Product.php");

    $categories = $cat-> get_category();


?>

            <div class="col-md-10">
                <h2>Add Products</h2>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active"><a href="allproduct.php">All Products</a></li>
                    <li class="breadcrumb-item active">Update Product</li>
                </ol>
                <form action="process/edit_prod_process.php" method="post" enctype="multipart/form-data" class="edit-prod">
                    <?php
                        if(isset($_GET["edit"])){
                            $prod_id = $_GET["edit"];
                           
                            
                            $prod= $product->get_product_byID($prod_id);
                            
                    ?>
                            <center>
                                <img src="../uploads/<?php echo $prod["prod_image"]?>" name="old_image" alt="" width="200px" class="rounded m-auto">                          
                            </center>
                             <div class="mb-3">
                                <input type="hidden" name="update_prod" value="<?php echo $prod['prod_id']?>">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="name" name="prod_name" value="<?php echo $prod['prod_name']?>">
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">Select One</option>
                                    <?php
                                    foreach ($categories as $category) {
                                        $selected = ($category["cat_id"] == $prod['category_id']) ? 'selected' : '';
                                        ?>
                                        <option value="<?php echo $category["cat_id"] ?>" <?php echo $selected ?>><?php echo $category["cat_name"] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-check-label" for="text">Description</label>
                                <textarea name="desc" id="text" cols="30" rows="10" class="form-control"><?php echo $prod['prod_description']?></textarea> 
                            </div>
                            <div class="mb-3">
                                <label for="status">Product Status</label>
                                <div class="form-check">
                                    <input type="radio" name="prod_status" class="form-check-input" id="exampleRadio1" value="1" <?php echo ($prod['prod_status'] == 1) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="exampleRadio1">Available</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="radio" name="prod_status" class="form-check-input" id="exampleRadio2" value="0" <?php echo ($prod['prod_status'] == 0) ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="exampleRadio2">Not Available</label>
                                </div>
                            </div>                           
                            <div class="mb-3">
                                <label class="form-label" for="prodimg">Updated Image</label>
                                <input type="file" class="form-control" id="prodimg" name="prod_img">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="price">Product Price</label>
                                <input type="text" class="form-control" id="price" name="price" value="<?php echo $prod["prod_amount"]?>" >
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="btn_edit" class="btn btn-success" onclick="return confirm('Are you sure you want to update this product?');">Update</button>
                            </div>
                    <?php
                        } 
                    ?>
                     
                             
               </form>
            </div>
        </div>
 <?php
        require_once("partials/footer.php");
 ?>