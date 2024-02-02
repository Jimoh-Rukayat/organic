<?php
    error_reporting(E_ALL);
    require_once("Db.php");

    class Cart extends Db{
        private $dbconn;

        public function __construct(){
            $this->dbconn = $this->connect();

        }
  
       public function fetchAllCartItems(){
        try {
            $sql = "SELECT * FROM cart";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Error fetching cart items: " . $e->getMessage());
            return false;
        }
       }

       
    
      
      
    
    }


    
?>