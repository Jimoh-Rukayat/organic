<?php
    session_start();
    if (!isset($_SESSION["user_id"])) {
        header("location:login.php");
        exit();
    }
    require_once("partials/header.php");
    require_once "classes/Cart.php";
    error_reporting(E_ALL);
   
    
    $cart = new Cart();
    $user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;

   
?>
<table class="table table-striped table-hover" width="100%" cellpadding="10" cellspacing="1">
    <?php
        $carts = $cart->fetchAllCartItems($user_id);
        if(!empty($carts && isset($_SESSION["user_id"]))){
        foreach($carts as $u){
    ?>
    <thead>
        <tr>
          <th>Product Name</th>
          <th>Qty</th>
          <th>Amount</th>
          <th>Order Status</th>
          <th>Order Date</th>
       </tr>
   </thead>
    <tbody>
         <tr>
            <td><?php echo $u["prod_name"]?></td>
            <td><?php echo $u["prod_qty"]?></td>
            <td>&#8358;<?php echo $u["prod_qty"] * $u["prod_amt"] ?></td>
            <td><?php echo $u["date_added"]?></td>
                               
          </tr>
          <?php
            }
          ?>
    </tbody>
</table>
<?php
   }else{         
        echo "<div class='col text-center m-5'>  
              <i class='fa fa-shopping-cart shop-cart text-success' ></i>  
              <p class='mt-5'>Your Cart is empty!</p>  
               <a href='shop.php'><button class='btn btn-success mt-3 col-4 p-2'>Start Shopping</button></a>
            </div>"; 
     }
 ?>

<?php
    require_once("partials/footer.php");
 ?>