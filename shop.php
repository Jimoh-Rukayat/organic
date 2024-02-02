<?php
    session_start();
    error_reporting(E_ALL);

        require_once("partials/header.php");
        require_once("classes/Product.php");

        $products = $product->get_all_products();
?>
        <div class="row">
        <?php
            if(isset($_SESSION["success_feedback"])){
                 echo $_SESSION["success_feedback"] = "<div class= 'alert alert-success  col-4 position-absolute end-0'>" . $_SESSION["success_feedback"] . "</div>";
                 unset($_SESSION["success_feedback"]);
             }
            
             if(isset($_SESSION["errormessage"])){
                    echo $_SESSION["errormessage"] = "<div class= 'alert alert-danger col-4 position-absolute end-0'>" . $_SESSION["errormessage"] . "</div>";
                    unset($_SESSION["errormessage"]);
            }
        ?>
            <div class="col text-center mt-5">
           
                <p class="text-success">VISIT OUR SHOP</p>
                <h4>Buy Our Products</h4>
            </div>
            <div class="">
                <div class="prod-category text-center mt-5 text-dark">
                    <a href="">Fresh Vegetables</a>
                    <div class="line"></div>
                    <a href="">Fresh Fruits</a>
                    <div class="line"></div>
                    <a href="">Farm Inputs</a>
                </div>
            </div>
        </div>
      
        <form action="process/process_cart.php" method="post" enctype="multipart/form-data"> 
            <div class="row shop-now mt-5 bg-light d-lg-flex flex-lg-row justify-content-around ">  
            <?php
                foreach($products as $prod){ 
            ?>  
               <div class="col-md-3 card-shadow product-data p-5">
                   <a href="single_product.php?id=<?php echo $prod['prod_id']?>" style="color:black; text-decoration:none">           
                        <div>
                            <img src="uploads/<?php echo $prod['prod_image']?>" alt="<?php echo $prod['prod_name']?>" id="prod_image" style="height:200px; width:200px" class="image-fluid mt-5">
                        
                        </div>
                        <hr width="200" style="border: 2px solid red;" class="mt-4">
                        <p class="px-4" id="prod_name"><?php echo $prod['prod_name']?></p>
                        <p id="prod_amt" class="px-4">&#8358;<?php echo number_format($prod['prod_amount'], 2)?>/kg</p>
                        <button class="btn btn-success btn-sm mx-4 add2cart" name="add2cart" value="<?php echo $prod['prod_id']?>">
                            <i class="fa fa-shopping-cart me-2"></i>Add to Cart
                        </button>
                    </a>
               </div>
               <input type="hidden" name="prod_image" value="<?php echo $prod['prod_image']?>" id="prod_id">
                <input type="hidden" name="prod_name" value="<?php echo $prod['prod_name']?>">
                <input type="hidden" name="prod_amt" value="<?php echo $prod['prod_amount']?>">
                <input type="hidden" name="prod_id" value="<?php echo $prod['prod_id']?>">
                <input type="hidden" name="user_id" value="<?php echo $prod['user_id']?>">
            <?php        
               }
            ?> 
            </div>
        </form>
<?php
    require_once("partials/footer.php");
    
?>