<?php
     error_reporting(E_ALL);
     require_once("Db.php");
 
     class Order extends Db{
        private $dbconn;
 
        public function __construct(){
            $this->dbconn = $this->connect();
 
        }

        public function order_details($user_fullname, $user_email, $order_shipping_address, $state, $order_total_amount, $user_id, $user_phone, $order_ref_no){
            try {
                $sql = "INSERT INTO orders(user_fullname, user_email, order_shipping_address, order_state, order_total_amount, user_id, user_phone, order_ref_no) VALUES(?,?,?,?,?,?,?,?)";
                $stmt = $this->dbconn->prepare($sql);
                $response = $stmt->execute([$user_fullname, $user_email, $order_shipping_address, $state, $order_total_amount, $user_id, $user_phone, $order_ref_no]);
                return $response;
            } catch (PDOEXception $e) {
               $e->getMessage();
            }
        }

        public function get_order_details($order_ref_no){
            try {
                $query = "SELECT * FROM orders WHERE order_ref_no= ?";
                $stmt = $this->dbconn->prepare($query);
                $stmt->execute([$order_ref_no]);
                $resp = $stmt->fetch(PDO::FETCH_ASSOC);
                return $resp;
            } catch (PDOException $e) {
                return false;
            }
        }

        public function user_order_details($prod_id, $order_amount, $order_qty, $order_id){
            try {
                $sql = "INSERT INTO order_details(prod_id, order_amount, order_qty, order_id) VALUES(?,?,?,?)";
                $stmt = $this->dbconn->prepare($sql);
                $response = $stmt->execute([$prod_id, $order_amount, $order_qty, $order_id]);
                return $response;

            }catch (PDOException $e) {
                return false;
            }

        }    
       
        











     }









?>