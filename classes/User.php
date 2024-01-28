<?php
    error_reporting(E_ALL);
   // session_start();
    require_once("Db.php");

    class User extends Db{
        private $dbconn;

        public function __construct(){
            $this->dbconn = $this->connect();
        }

        public function validateEmail($user_email){
            $sql = "SELECT * FROM users WHERE user_email = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$user_email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $_SESSION["errormessage"] = "Email already exists";
                header("location:../signup.php");
               exit();
            } else {
                return true; 
            }
        }
        public function create_account($user_fname, $user_lname, $user_email, $user_password, $confirm_password){
            $res = $this->validateEmail($user_email);
            if($res == 0){
                return "Email already exists";
            }else{
                if($user_password ==  $confirm_password){
                    try {
                         $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
                         $query = "INSERT INTO users(user_fname, user_lname, user_email, user_password) VALUES (?, ?, ?, ?)";
                         $statement = $this->dbconn->prepare($query);
                         $result= $statement->execute([$user_fname, $user_lname, $user_email,  $hashed_password]);
                        
                         $_SESSION["success_feedback"] = "Account created successfully!";
                         $userid = $this->dbconn->lastInsertId();
                         return $result;
                    } catch (PDOException $e) {
                       $_SESSION["errormessage"] = "An error occurred:" . $e->getMessage();
                         return 0;      
                    }
                    catch(Exception $e){
                     $_SESSION["errormessage"] = "An error occurred:" . $e->getMessage();
                     return 0;
                    }
                 }else{
                     $_SESSION["errormessage"] = "Password and confirm password must be the same";
                     return 0;
                 }
            }
            
             
         }

         public function login($email, $pwd){
            $sql = "SELECT * FROM users WHERE user_email=?";
            $statement = $this->dbconn->prepare($sql);
            $statement->execute([$email]);
            $rec = $statement->fetch(PDO::FETCH_ASSOC);

           if($rec){
                $hashed_pwd = $rec["user_password"];
                $check = password_verify($pwd, $hashed_pwd);
                if($check){
                    return $rec;
                }else{     
                    return false;
                }
           }else{
            return false;
           }
         }
         public function logout(){
            session_start();
            session_unset();
            session_destroy();
        }

        public function get_user($id){
            $sql = "SELECT * FROM users WHERE user_id=?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $res = $stmt->fetch(PDO::FETCH_ASSOC);
            return $res;
        }
        
        public function get_state(){
            $query = "SELECT * FROM state";
            $stmt = $this->dbconn->prepare($query);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }

        public function getlga_bystate($id){
            $query = "SELECT * FROM lga WHERE state_id=?";
            $stmt = $this->dbconn->prepare($query);
            $stmt->execute([$id]);
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
      
       
     }          

    

    $user= new User();
    
  
?>