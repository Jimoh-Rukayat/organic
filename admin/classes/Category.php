<?php
    error_reporting(E_ALL);
    require_once("Db.php");

    class Category extends Db{
        private $dbconn;

        public function __construct(){
            $this->dbconn = $this->connect();

        }
       public function add_category($cat_name){
            try {
                $sql = "INSERT INTO category(cat_name) VALUES(?)";
                $stmt = $this->dbconn->prepare($sql);
                $response = $stmt->execute([$cat_name]);
                return $response;
            } catch (PDOException $e) {
                $_SESSION["errormessage"] = "An error occurred:" . $e->getMessage();
            }
       }

        public function get_category(){
           try {
            $sql = "SELECT * FROM category";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $cats = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $cats;
           } catch (PDOException $e) {
            $_SESSION["errormessage"] = "An error occurred:" . $e->getMessage();
           }
        }


        public function edit_category($cat_id, $cat_name){
            try {
                $sql = "UPDATE category SET cat_name = ? WHERE cat_id = ?";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$cat_name, $cat_id]);
                return true; 
            } catch (PDOException $e) {
                error_log("Error updating category: " . $e->getMessage());
                return false; 
            }
        }

        public function delete_category($cat_id) {
            try {

                $sql_1 = "DELETE FROM products WHERE prod_id = ?";
                $stmt_1 = $this->dbconn->prepare($sql_1);
                $stmt_1->execute([$cat_id]);

                $sql_2 = "DELETE FROM category WHERE cat_id = ?";
                $stmt_2 = $this->dbconn->prepare($sql_2);
                $response = $stmt_2->execute([$cat_id]);

                if($response){
                    return "Category deleted successfully!";
                }else{
                    return "Failed to delete category. Please try again or contact support.";
                }
            } catch (PDOException $e) {
                $_SESSION["errormessage"] = "An error occurred: " . $e->getMessage();
                return "Failed to delete category. Please try again or contact support.";
            }
        }
          
        public function get_category_byId($cat_id){
            try {
                $sql = "SELECT * FROM category WHERE cat_id = ?";
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute([$cat_id]);
                $cats = $stmt->fetch(PDO::FETCH_ASSOC);
                return $cats;
            }catch (PDOException $e) {
                $_SESSION["errormessage"] = "An error occurred:" . $e->getMessage();
            }
           
        }

    }

    $cat = new Category();

?>