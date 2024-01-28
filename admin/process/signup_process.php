<?php
    error_reporting(E_ALL);
    session_start();
    require_once("../classes/utilities.php");
    require_once("../classes/Admin.php");

    if($_POST && isset($_POST["btn_sign"])){
        $username = sanitizer($_POST["username"]);
        $email =    sanitizer($_POST["email"]);
        $password = $_POST["password"];
        $conf_pwd = $_POST["conf_password"];

        if(empty($username)){
            $_SESSION['errormessage'] = "Username is required";
            header("location:../signup.php");
            exit();
        }
        if(empty($email)){
            $_SESSION['errormessage'] = "email is required";
            header("location:../signup.php");
            exit();
        }
        if(strlen($password) < 8){
            $_SESSION['errormessage'] = "password should be of 8 characters";
            header("location:../signup.php");
            exit();
        }
        if(empty($username) && empty($email) && empty($password) && empty($conf_pwd)){
            $_SESSION['errormessage'] = "All fields are required";
            header("location:../signup.php");
            exit();
        }
      
        $response = $admin->admin_signup($username, $email, $password, $conf_pwd);
        
        if($response){
            $_SESSION["success_msg"];
                header("location:../login.php");
                exit();
            }else{
                $_SESSION['errormessage'] = "All fields are required";
                header("location:../signup.php");
                exit();
            }

    }else{
        $_SESSION["errormessage"] = "Please provide your login details";
        header("location:../signup.php");
        exit();
    }



?>