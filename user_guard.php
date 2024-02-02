<?php

    if(!(isset($_SESSION["useronline"]))){
        $_SESSION["userfeedback"] = "You must be logged in in order to access this page.";

        header("location:cart.php");
        exit();
    }
    

    
?>


<!-- <div class=" col-md-3 card-shadow product-data p-5">
                    <a href="single_product.php?id=<?php echo $prod['prod_id']?>" style="color:black; text-decoration:none">
                        <img src="uploads/<?php echo $prod['prod_image']?>" alt="<?php echo $prod['prod_name']?>" id="prod_image" style="height:200px; width:200px" class="image-fluid mt-5">   
                        <input type="hidden" name="prod_image" value="<?php echo $prod['prod_image']?>">
                        <hr width="200" style="border: 2px solid red;" class="mt-4">
                        <div class="mt-3 px-4">
                            <p id="prod_name"><?php echo $prod['prod_name']?></p>
                            <input type="hidden" name="prod_name" value="<?php echo $prod['prod_name']?>">
                            <p id="prod_amt">&#8358;<?php echo number_format($prod['prod_amount'], 2)?>/kg</p> 
                            <input type="hidden" name="prod_amt" value="<?php echo $prod['prod_amount']?>"> 
                        </div>
                    </a>
                        <button class="btn btn-success col-md-6 btn-sm add2cart mb-5" name="add2cart" value="<?php echo $prod['prod_id']?>" >
                            <i class="fa fa-shopping-cart me-3" ></i>Add to cart
                        </button>                     
                </div>       -->





