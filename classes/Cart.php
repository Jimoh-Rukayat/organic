<?php
    error_reporting(E_ALL);
    require_once("Db.php");

    class Cart extends Db{
        private $dbconn;

        public function __construct(){
            $this->dbconn = $this->connect();

        }

        public function get_cart_items($prod_id, $user_id){
            try {
                $sql = "SELECT * FROM cart WHERE prod_id = ? AND user_id = ?";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$prod_id, $user_id]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function cart_items($prod_image, $prod_name, $prod_qty, $prod_amt, $user_id, $prod_id) {
            try {
                $sql = "INSERT INTO cart(prod_image, prod_name, prod_qty, prod_amt, user_id, prod_id) VALUES(?,?,?,?,?,?)";
                $stmt = $this->dbconn->prepare($sql);
                $result = $stmt->execute([$prod_image, $prod_name, $prod_qty, $prod_amt, $user_id, $prod_id]);
                return $result;

            }catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
       
       public function fetchAllCartItems($user_id){
        try {
            $sql = "SELECT * FROM cart WHERE user_id=?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$user_id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Error fetching cart items: " . $e->getMessage());
            return false;
        }
       }

       public function updateProductQuantity($prod_id, $prod_qty, $prod_amt) {
        try {
            $sql = "UPDATE cart SET prod_qty = ?, prod_amt = ? WHERE prod_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $response =$stmt->execute([$prod_qty, $prod_amt, $prod_id]);
            return $response;
        } catch (PDOException $e) {
            return false;
        }
    }

       public function remove_cart_items($cart_id){
        try {
            $sql = "DELETE FROM cart WHERE cart_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $response = $stmt->execute([$cart_id]);
            if($response){
                return "Product removed from cart";
            }else{
                return "Failed to remove product from cart";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }

       }
    
       public function CartItemsCount($user_id){
        try {
            $sql = "SELECT * FROM cart WHERE user_id=?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$user_id]);
            $count = $stmt->rowCount();
            
            return $count;
        } catch (PDOException $e) {
            error_log("Error fetching cart items count: " . $e->getMessage());
            return false;
        }
    }
    
    public function delete_allcart_items($user_id){
        try {
            $sql = "DELETE FROM cart WHERE user_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $response = $stmt->execute([$user_id]);
            return $response;
        } catch (PDOException $e) {
            error_log("Error fetching cart items count: " . $e->getMessage());
            return false;
        }

       }
    
      
    
    }


    
?>