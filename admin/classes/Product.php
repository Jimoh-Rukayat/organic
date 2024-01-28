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
            try {
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
            } catch (PDOException $e) {
                $_SESSION["errormessage"] = "Unable to add products: " . $e->getMessage();
                header("location:../addproduct.php");
                exit();
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

                $allowed = ["image/jpeg" , "image/jpg" , "image/png", "image/jfif", "image/webp"];
                if(!in_array($type, $allowed)){
                    $_SESSION["errormessage"] = "Please upload a jpeg, jpg, jfif, webp or png image";
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
            
            try {
                $sql = "SELECT * FROM products CROSS JOIN category ON products.category_id = category.cat_id";
                $stmt= $this->dbconn->prepare($sql);
                $stmt->execute();
                $prod = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $prod;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function get_product_byID($prod_id){
            try {
                $sql = "SELECT * FROM products WHERE prod_id =?";
                $stmt= $this->dbconn->prepare($sql);
                $stmt->execute([$prod_id]);
                $prod = $stmt->fetch(PDO::FETCH_ASSOC);
                if($prod){
                    return $prod;
                }else{
                    return false;
                }
            } catch (PDOException $e) {
               echo $e->getMessage();
            }
        }
        



        public function edit_product($prod_name, $prod_description, $prod_image, $prod_status, $prod_amount, $prod_cate, $prod_id){

            try{
                $sql = "UPDATE products SET prod_name=?, prod_description=?, prod_image=?, prod_status=?, prod_amount=?, category_id =? WHERE prod_id=?";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$prod_name, $prod_description, $prod_image, $prod_status, $prod_amount, $prod_cate, $prod_id]);
                $rowCount = $stmt->rowCount();
                return $rowCount > 0; 

            }catch (PDOException $e) {

                $_SESSION["errormessage"] = "Update Failed: " . $e->getMessage();
                header("location:../edit_prod.php");
                exit();
            }
        }
        

        public function delete_product($prod_id){
            try {
                $sql = "DELETE FROM products WHERE prod_id = ?";
                $stmt = $this->dbconn->prepare($sql);
                $response = $stmt->execute([$prod_id]);

                if($response){

                return "Product deleted successfully!";
                    } else {

                        return "Failed to delete product. Please try again or contact support.";
                }
            }catch (PDOException $e) {
                echo $e->getMessage();
            }

        }
        
    }

$product = new Product();

?>