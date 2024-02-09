<?php
     error_reporting(E_ALL);
     require_once("Db.php");
 
     class Order extends Db{
        private $dbconn;
 
        public function __construct(){
            $this->dbconn = $this->connect();
 
        }

        public function get_all_orders(){
            try{
                $sql = "SELECT * FROM orders JOIN state ON orders.order_state = state.state_id";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute();
                $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $response;
                
                }catch (PDOException $e) {
                    echo $e->getMessage();
                }
            
        }


        public function get_order_details(){
            try {
                $sql = "SELECT * FROM order_details JOIN orders JOIN products JOIN payment ON order_details.prod_id = products.prod_id AND order_details.order_id = orders.order_id";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute();
                $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $response;

            }catch (PDOException $e) {
                return false;
            }

        }    

     }

       









?>