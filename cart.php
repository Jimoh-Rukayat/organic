<?php
session_start();
  error_reporting(E_ALL);
  if (!isset($_SESSION["user_id"])) {
    header("location:login.php");
    exit();
}
  require_once("partials/header.php");
  require_once "classes/Cart.php";
  require_once "classes/User.php";

      $cart = new Cart();

    if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
       
      } 
      
 
  $grand_total = 0;
?>
<div class="row">
    <div class="col-md">
        <div class="card mt-5">
          <div class="col-md-12 card-body"> 
              <?php 
                  $carts = $cart->fetchAllCartItems($user_id);
                   if(!empty($carts && isset($_SESSION["user_id"]))){
                        echo "<div>
                              <h5>Shopping Cart</h5>
                            </div> <hr>
                         <table class='table table-bordered p-4'>
                           <thead>
                             <th>Product</th>
                             <th>Name</th>
                             <th>Price</th>
                             <th>Quantity</th>
                             <th>Total</th>
                             <th>Action</th>
                           </thead>
                           <tbody>";
                      foreach($carts as $cart){   
                        print_r($cart);
                        die();
              ?>
           <tr class="product-data">
                    <td><img src="uploads/<?php echo $cart["prod_image"]?>" alt="" width="100" class="rounded"></td>
                    <input type="hidden" class="prod_id" name="prod_id"  value="<?php echo $cart['prod_id']?>">
                    <td><?php echo $cart["prod_name"]?></td>
                    <td>&#8358;<?php echo $cart["prod_amt"]?></td>
                    <input type="hidden" name="prod_amt" class="prod_amt" value="<?php echo $cart['prod_amt']?>">
                    <td>
                        <div>
                          <input type="number" class="form-control bg-white text-center qty-input" min="1" style="width:70px" value="<?php echo $cart["prod_qty"]?>">                 
                          <input type="hidden" name="prod_qty">
                        </div>
                    </td>
                    <td>&#8358;<?php echo number_format($cart["prod_amt"] * $cart["prod_qty"], 2)?></td>
                    <input type="hidden" name="amount" class="total-amount">
                    <td>
                        <form action="del_cart.php" method="post" onsubmit="return confirm('Are you sure you want to remove this product?')">
                            <input type="hidden" name="delete_cart" class="cart_id" value="<?php echo $cart['cart_id']?>">
                            <button type="submit" class="btn btn-danger btn-sm" name="delete-item">
                                <i class="fas fa-trash me-2"></i>Remove
                            </button>
                        </form>
                    </td>
              </tr>
              <?php
                  $grand_total = $grand_total + ($cart["prod_amt"] * $cart["prod_qty"]);
                 }
                  
              ?>          
                  
                  </tbody>
                  </table>
             </div>
            </div>
               <div class="d-lg-flex justify-content-between p-4">
                  <a href="shop.php"><button class="btn btn-success no-round">Continue Shopping</button></a>
                  <h3 class="fs-5">Grand total: <span>&#8358;<?php echo number_format($grand_total, 2)?></span></h3>
                  <form action="process/process_order_det.php" method="post">
                    <a href="checkout.php"><button class="btn btn-success" name="chkout_btn" type="submit">Checkout</button></a>
                    <input type="hidden" name="prod_id" value="<?php echo $cart['prod_id']?>">
                    <input type="hidden" name="prod_qty" value="<?php echo $cart["prod_qty"]?>">    
                    <input type="hidden" name="amount" value="<?php echo $cart['prod_amt']?>">
                  </form>
               </div>
              <?php
              }else{
                
                          echo "<div class='col text-center m-5'>  
                          <i class='fa fa-shopping-cart shop-cart text-success' ></i>  
                          <p class='mt-5'>Your Cart is empty!</p>  
                           <a href='shop.php'><button class='btn btn-success mt-3 col-4 p-2'>Start Shopping</button></a>
                        </div>"; 
                            

                  }
              ?>
          </div>
        </div>
    </div>



<?php

    require_once ("partials/footer.php");
    
?>


