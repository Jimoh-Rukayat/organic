<style>
    .desc{
        box-shadow: 1px 1px 1px 1px grey;
        line-height: 3em;
    }
</style>
<?php
    error_reporting(E_ALL);
     require_once("partials/header.php");
     require_once("classes/Product.php");



    if(isset($_GET["id"])){
        $edit_id = $_GET["id"];
       
         $productData = $product->get_single_product($edit_id);

    }

?>
    <form action="process/cart_process.php" method="post" enctype="multipart/form-data" class="form"> 
        <div class="row text-center m-5  d-lg-flex flex-lg-row  justify-content-around align-items-center me-4 product-data">
            <div class="col-md-4 card">
                <div class="col-md-6 p-5" style=" height: 500px; width:">
                    <div class="card-shadow bg-light" >
                        <img src="uploads/<?php echo $productData["prod_image"] ?>" alt="products"  style="height:300px; width:300px" class=" image-fluid rounded align-items-center" id="prod_image">                  
                    </div>
                </div>
            </div>
            <div class="col-md-5 card-shadow desc p-5 align-items-center mb-5">
                <h5><?php echo $productData["prod_name"] ?></h5><hr >
                <p><?php echo $productData["prod_description"] ?></p>
                <div class="d-flex justify-content-around">
                        <div class="input-group mb-3" style="width:120px">
                            <button class="input-group-text update-qty" id="decrement-btn" type="submit" name="update-quantity" value="decrement">-</button>
                            <input type="text" class="form-control bg-white text-center qty-input" value='1'>
                            <button class="input-group-text update-qty" id="increment-btn" type="submit" name="update-quantity" value="increment">+</button>
                        </div>
                    <div>
                        <p id="prod_amt" class="text-danger fw-bold">&#8358;<?php echo number_format($productData["prod_amount"], 2) ?>/kg</p>
                    </div>
                </div>
                <button class="btn btn-success col-md-6 btn-sm add2cart" name="add2cart"  value="<?php echo $productData['prod_id']?>" >
                    <i class="fa fa-shopping-cart me-3"></i>Add to cart
                </button>    
                <input type="hidden" name="user_id" value="<?php echo $productData['user_id']?>">
                 <input type="hidden" name="image" value="<?php echo $productData['prod_image']?>" id="prod_id">
                 <input type="hidden" name="name" value="<?php echo $productData['prod_name']?>" >
                <input type="hidden" name="amount"  value="<?php echo $productData['prod_amount']?>" >
                <input type="hidden" name="id" class="prod_id" value='<?php echo $productData["prod_id"]?>'>
                <input type="hidden" class="new-qty" value='<?php echo $productData["prod_id"]?>'>
            </div>
        </div>
    </form>
<?php

    require("partials/footer.php");
?>









