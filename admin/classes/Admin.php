<?php
    error_reporting(E_ALL);
    require_once("Db.php");


    class Admin extends Db{
        private $dbconn;

       public function __construct(){
        $this->dbconn = $this->connect();
       }
       public function admin_signup($admin_username, $admin_email, $admin_password, $conf_pw){
            if($admin_password == $conf_pw){
                try {
                    $pw_hash = password_hash($admin_password, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO admin(admin_username, admin_email, admin_password) VALUES(?,?,?)";
                    $stmt = $this->dbconn->prepare($sql);
                    $result = $stmt->execute([$admin_username, $admin_email, $pw_hash]);

                    $_SESSION["success_feedback"] = "Account created successfully!";
                    $userid = $this->dbconn->lastInsertId();
                    return $result;
                } catch (PDOException $e) {
                    $_SESSION["errormessage"] = "An error occurred:" . $e->getMessage();
                    // return 0;
                }
                catch (PDOException $e) {
                    $_SESSION["errormessage"] = "An error occurred:" . $e->getMessage();
                   // return 0;
                }
            }else{
                $_SESSION["errormessage"] = "Password and Confirm Password must be the same";
            }
       }

        public function admin_login($admin_email, $admin_password){
                try {
                    $sql = "SELECT * FROM admin WHERE admin_email=?";
                    $stmt = $this->dbconn->prepare($sql);
                    $stmt->execute([$admin_email]);
                    $resp = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($resp){
                        $hashed_pwd = $resp["admin_password"];
                        $check = password_verify($admin_password, $hashed_pwd);
                        if($check){
                            return $resp["admin_id"];
                        }else{
                            $_SESSION["errormessage"] = "Invalid Login details";
                            return false;
                        }
                    }else{
                        $_SESSION["errormessage"] = "Invalid Login details";
                            return false;
                    }
                } catch (PDOException $e) {
                    $_SESSION["errormessage"] = "An error occurred:" . $e->getMessage();
                    
                }
               
        }

        public function admin_logout(){
            session_unset();
            session_destroy();
        }
    }

  

    $admin = new Admin();
    

?>