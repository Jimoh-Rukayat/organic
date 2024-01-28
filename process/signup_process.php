<?php
        error_reporting(E_ALL);
        session_start();
        require_once("../classes/utilities.php");
        require_once("../classes/User.php");

        if($_POST && isset($_POST["btn_sign"])){

            $firstname = sanitizer($_POST["fname"]);
            $lastname = sanitizer($_POST["lname"]);
            $email =     sanitizer($_POST["email"]);
            $password = $_POST["password"];
            $confrim_password = $_POST["conf_password"];

            if(empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confrim_password) ){
                $_SESSION["errormessage"] = "All fields are required!";
                header("location:../signup.php");
                exit();
            }
            if(strlen($password) < 8){
                $_SESSION["errormessage"] = "password must be of 8 characters";
                header("location:../signup.php");
                exit();
            }
            if($password != $confrim_password) {
                $_SESSION["errormessage"] = "password and confirm password must be the same";
                header("location:../signup.php");
                exit();
            }

           $response= $user->create_account($firstname,  $lastname,  $email, $password, $confrim_password);
           if($response){
            $_SESSION["success_feedback"] = $response;
                header("location:../login.php");
                exit();
            }else{
                $_SESSION['errormessage'];
                header("location:../signup.php");
                exit();
            }

        }else{
            $_SESSION["errormessage"] = "Invalid Access. All fields are required";
           header("location:../signup.php");
             exit();
        }



        
?>
