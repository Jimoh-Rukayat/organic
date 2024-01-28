<?php
    session_start();
    error_reporting(E_ALL);
  
    require_once("../classes/utilities.php");
    require_once("../classes/User.php");


    if($_POST && isset($_POST["btnlogin"])){
        $email = sanitizer( $_POST["email"]);
        $pwd = $_POST["password"];

        $response = $user->login($email, $pwd);
        if($response){
            $_SESSION["user_id"] = $response["user_id"];
            header("location:../cart.php");
                exit();
        }else{
                $_SESSION["errormessage"] = "Login Failed! Incorrect email or password";
                header("location:../login.php");
                exit();

        }

    }else{
        $_SESSION["errormessage"]= "Please provide your login details";
        header("location:../login.php");
        exit();
    }

?>