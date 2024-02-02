<?php
    error_reporting(E_ALL);
    require_once "Db.php";


    class Search extends Db{
        private $dbconn;

        public function __construct(){
            $this->dbconn = $this->connect();

        }

        public function search_products($searchTerm) {
            try {
                $sql = "SELECT * FROM products WHERE prod_name LIKE '%' ? '%'";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$searchTerm]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        

   }






?>