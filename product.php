<?php
        require_once("partials/header.php");
        require_once("classes/Product.php");

?>
        <div class="row">
            <div class="col text-center mt-5">
                <p class="text-success">VISIT OUR SHOP</p>
                <h4>Buy Our Products</h4>
            </div>
            <div class="">
                <div class="prod-category text-center mt-5 text-dark">
                    <a href="#vegetables">Fresh Vegetables</a>
                    <div class="line"></div>
                    <a href="#fruits">Fresh Fruits</a>
                    <div class="line"></div>
                    <a href="#inputs">Farm Inputs</a>
                </div>
            </div>
        </div>
        <form action="process/process_cart.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col mt-5 d-flex">
                    <h3 id="vegetables">Vegetables</h3>
                    <?php
                            $products = $product->get_products("Vegetables");
                            foreach($products as $prod){
                        ?>
                            <div class=" col-md-3 card-shadow m-5 ">
                                <a href="single_product.php?id=<?php echo $prod['prod_id']?>" style="color:black; text-decoration:none">
                                    <img src="uploads/<?php echo $prod['prod_image']?>" alt="<?php echo $prod['prod_name']?>" id="prod_image" style="height:200px; width:200px" class="image-fluid mt-3">
                                    <div class="mt-3 px-4">
                                        <p id="prod_name"><?php echo $prod['prod_name']?></p>
                                        <p id="prod_amt">&#8358;<?php echo number_format($prod['prod_amount'], 2)?>/kg</p>
                                    </div>
                                </a> 
                                <button class="btn btn-success btn-sm mx-3" name="add2cart" value="<?php echo $prod['prod_id']?>" ><i class="fa fa-shopping-cart me-3"></i>Add to Cart
                                </button>                                                                      
                            </div>        
                        <?php       
                        }
                        ?>
                </div>
                <div class="col  mt-5 d-flex">
                        <h3 id="fruits">Fruits</h3>
                        <?php
                            $products = $product->get_products("Fruits");
                            foreach($products as $prod){
                        ?>
                            <div class=" col-md-3 card-shadow m-5 ">
                                <a href="single_product.php?id=<?php echo $prod['prod_id']?>" style="color:black; text-decoration:none">
                                    <img src="uploads/<?php echo $prod['prod_image']?>" alt="<?php echo $prod['prod_name']?>" id="prod_image" style="height:200px; width:200px" class="image-fluid mt-3">
                                    <div class="mt-3 px-4">
                                        <p id="prod_name"><?php echo $prod['prod_name']?></p>
                                        <p id="prod_amt">&#8358;<?php echo number_format($prod['prod_amount'], 2)?>/kg</p>
                                </div>
                                </a> 
                                <button class="btn btn-success btn-sm mx-3"  name="add2cart"><i class="fa fa-shopping-cart me-3"></i>Add to Cart</button>                        
                            </div>        
                        <?php       
                        }
                        ?>
                </div>
                <div class="col mt-5 d-flex">
                    <h3 id="inputs">Farm Inputs</h3>
                    <?php
                        $products = $product->get_products("Farm Input");
                        foreach($products as $prod){
                    ?>
                    <div class=" col-md-3 card-shadow m-5 ">
                            <a href="single_product.php?id=<?php echo $prod['prod_id']?>" style="color:black; text-decoration:none">
                            <img src="uploads/<?php echo $prod['prod_image']?>" alt="<?php echo $prod['prod_name']?>" id="prod_image" style="height:200px; width:200px" class="image-fluid mt-3">
                            <div class="mt-3 px-4">
                                <p id="prod_name"><?php echo $prod['prod_name']?></p>
                                <p id="prod_amt">&#8358;<?php echo number_format($prod['prod_amount'], 2)?>/kg</p>
                            </div>
                            </a>  
                            <button class="btn btn-success btn-sm mx-3"  name="add2cart"><i class="fa fa-shopping-cart me-3"></i>Add to Cart</button>                                                                      
                    </div>        
                    <?php       
                        }
                    ?>
                </div>
                <input type="hidden" name="user_id" value="<?php echo $prod['user_id']?>">
                <input type="hidden" name="prod_image" value="<?php echo $prod['prod_image']?>" id="prod_id">
                <input type="hidden" name="prod_name" value="<?php echo $prod['prod_name']?>" >
                <input type="hidden" name="prod_amt"  value="<?php echo $prod['prod_amount']?>" >
                <input type="hidden" name="id" class="prod_id" value='<?php echo $prod["prod_id"]?>'>
                <input type="hidden" class="new-qty" value='<?php echo $prod["prod_id"]?>'>
            </div>
        </form>
  <?php
        require_once("partials/footer.php");
  ?>