<?php
session_start();
error_reporting(E_ALL);

      require_once("partials/header.php");
      require_once "classes/Cart.php";
      require_once "classes/User.php";
      require_once "classes/utilities.php";
    
     if (isset($_SESSION["user_id"])) {
      $id = $_SESSION["user_id"];



      $data = $user->get_user($id);
      if(!empty($data)){
          // echo "<pre>";
          // print_r($data);
          // echo "</pre>";
      }
      // if ($data !== null && is_array($data)) {
      //     // echo "<pre>";
      //     // print_r($data);
      //     // echo "</pre>";
      // } 
     
  }else{
    header("index.php");
    exit();
  }

 
  $cart = new Cart();
 
 
     $states = $user->get_state();

    //  echo '<pre>';
    //  print_r($states);
    //  echo '</pre>';
    //  die();
     

?>
 
<div class="container  col-md-12 py-5 mt-5" style="background-color: white;" >
  <p>Please confirm your details and proceed to fill the form in order to process your orders</p>
  <?php
        if(isset($_SESSION["errormessage"])){
            echo $_SESSION["errormessage"] = "<div class= 'alert alert-danger col-md-8 m-auto'>" . $_SESSION["errormessage"] . "</div>";
            unset($_SESSION["errormessage"]);
        }
  ?>
  <form action="process/order_process.php" method="post">
      <div class="col-md-8 m-auto">
        <div  class="mb-4">
          <label for="fullname">Fullname</label>
          <input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo $data["user_fname"].' '. $data["user_lname"]?>">
        </div>
        <div class="mb-4">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control"  value="<?php echo $data["user_email"]?>">
        </div>
        <div class="mb-4">
          <label for="address">Home Address</label>
          <input type="text" name="address" id="address" class="form-control">
        </div>
        <div class="mb-4">
          <label for="phone_no">Phone Number</label>
          <input type="text" name="phone_no" id="phone_no" class="form-control">
        </div>
        <div class="mb-3">
           <label for="location" class="form-label">State</label>
           <select name="location" id="location" class="form-control">
            <option value="">Select One</option>
                <?php
                   foreach ($states as $state) {
                ?>
                    <option value="<?php echo $state["state_id"] ?>"><?php echo $state["state_name"] ?></option>
                 <?php
                    }
                  ?>
                    </select>
                  </div>
            <?php
                    $grand_total = 0;
                      $carts = $cart->fetchAllCartItems($id);

                      foreach($carts as $cart){
                      
                        $grand_total = $grand_total + ($cart["prod_amt"] * $cart["prod_qty"]);
                            
                      }
         ?>
      <div class="mb-4">
            <label for="amt">Total Amount</label>
            <input type="text" name="" id="amt" class="form-control fw-bold fs-4" readonly value="&#8358;<?php echo number_format($grand_total, 2)?>">
            <input type="hidden" name="amt" value="<?php echo $grand_total?>">
        </div>
      <div class="mb-4">
        <input class="btn btn-sm btn-success noround col-md-3 float-start" id="btnsubmit" name="btnsubmit" type="submit" value="Continue">
      </div>
         
    </div>
  </form>
</div>

<?php
    require "partials/footer.php";
?>