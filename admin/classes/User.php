<?php
    error_reporting(E_ALL);
   // session_start();
    require_once("Db.php");

    class User extends Db{
        private $dbconn;

        public function __construct(){
            $this->dbconn = $this->connect();
        }

        public function get_all_users(){
            try{
            $sql = "SELECT * FROM users";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $response;
            
            }catch (PDOException $e) {
                echo $e->getMessage();
            }
        
        }

    }

    $user= new User();
    
  
?>