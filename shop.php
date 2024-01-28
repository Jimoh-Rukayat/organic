<?php
    session_start();
    error_reporting(E_ALL);

        require_once("partials/header.php");
        require_once("classes/Product.php");

        $products = $product->get_all_products();
        // echo "<pre>";
        // print_r($products);
        // echo "</pre>";
?>
<!-- 
                <div class="contact-background">
                    <div class="text">
                        <h2>Shop</h2>
                        <div class="shop">
                            <a class="nav-link" href="index.html">Home</a>
                            <span></span>
                            <p><i class="fa fa-circle" style="font-size:8px; color: green;"></i> Shop</p>
                        </div>
                    </div> -->
                </div>
               
            </div>
        </div>
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
            <div class="row shop-now mt-5 bg-light d-lg-flex flex-lg-row justify-content-between ">  
            <?php
                foreach($products as $prod){        
            ?>  
                <div class=" col-md-3 card-shadow product-data">
                        <a href="single_product.php?id=<?php echo $prod['prod_id']?>" style="color:black; text-decoration:none">
                            <img src="uploads/<?php echo $prod['prod_image']?>" alt="<?php echo $prod['prod_name']?>" id="prod_image" style="height:200px; width:200px" class="image-fluid mt-3">
                            <hr width="200" style="border: 2px solid red;" class="mt-4">
                            <div class="mt-3 px-4">
                                <p id="prod_name"><?php echo $prod['prod_name']?></p>
                                <p id="prod_amt">&#8358;<?php echo number_format($prod['prod_amount'], 2)?>/kg</p>
                                <input type="hidden" name="user_id" value="<?php echo $prod['user_id']?>">
                                <input type="hidden" name="image" value="<?php echo $prod['prod_image']?>" id="prod_id">
                                <input type="hidden" name="name" value="<?php echo $prod['prod_name']?>" >
                                <input type="hidden" name="amount" value="<?php echo $prod['prod_amount']?>" >
                                <input type="hidden" name="id" value="<?php echo $prod['prod_id']?>">
                                <input type="hidden" name="qty" value="1">
                            </div>
                        </a>
                        <button class="btn btn-success col-md-5 btn-sm add2cart" name="add2cart" class="add2cart" value="<?php echo $prod['prod_id']?>" >
                            <i class="fa fa-shopping-cart me-3"></i>Add to cart
                        </button>                          
                </div>        
            <?php        
               }
            ?> 
            </div>
        </form>
<?php
    require_once("partials/footer.php");
    
?>