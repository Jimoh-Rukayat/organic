<?php
    error_reporting(E_ALL);
    require_once("Db.php");



    class Product extends Db{
        private $dbconn;

        public function __construct(){
            $this->dbconn = $this->connect();

        }

        public function add_product($prod_name, $prod_description, $prod_image, $prod_status, $prod_amount, $prod_cate){
            $resp = $this->prod_image($prod_image);
            if($resp){
                $sql = "INSERT INTO products(prod_name, prod_description, prod_image, prod_status, prod_amount, category_id) VALUES(?,?,?,?,?,?)";
                $stmt = $this->dbconn->prepare($sql);
                $response = $stmt->execute([$prod_name, $prod_description, $resp, $prod_status, $prod_amount, $prod_cate]);
               
                if($response){
                    return true;
                }else{

                    return false;
                }
            }
        }



        public function prod_image($prod_image){
                $name = $prod_image["name"];
                $type = $prod_image["type"];
                $temp_name = $prod_image["tmp_name"];
                $size = $prod_image["size"];

                if($size > (2 * 1024 * 1024)){
                    $_SESSION["errormessage"] = "Maximum file size is 2mb";
                    return false;
                }

                $allowed = ["image/jpeg" , "image/jpg" , "image/png"];
                if(!in_array($type, $allowed)){
                    $_SESSION["errormessage"] = "Please upload a jpeg, jpg or png image";
                    return false;
                }

                $unique_name = "prod" . "_" . time() . "_" . uniqid() . "_". $name;
                $destination = "../../uploads/" . $unique_name;

                if(move_uploaded_file($temp_name, $destination)){
                    return $unique_name;
                }else{
                    return false;
                }
        }

        public function get_product(){
            $sql = "SELECT * FROM products WHERE prod_status = '1'  LIMIT 4 ";
            $stmt= $this->dbconn->prepare($sql);
            $stmt->execute();
            $prod = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $prod;
        }

        public function get_all_products(){
            $sql = "SELECT * FROM products";
            $stmt= $this->dbconn->prepare($sql);
            $stmt->execute();
            $prod = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $prod;
        }

        public function get_single_product($prod_id) {
            try {
                $sql = "SELECT * FROM products WHERE prod_id = ?";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$prod_id]);
                $prod = $stmt->fetch(PDO::FETCH_ASSOC);
                return $prod;
            } catch (PDOException $e) {
                echo "Error fetching single product: " . $e->getMessage();
                return null;
            }
        }
        

        public function get_products($cat_id){
            $sql = "SELECT * FROM products WHERE category_id = ?";
            $stmt= $this->dbconn->prepare($sql);
            $stmt->execute([$cat_id]);
            $prod = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $prod;
        }
    }

$product = new Product();

?>