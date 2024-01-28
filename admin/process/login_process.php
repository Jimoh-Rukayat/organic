<?php
    session_start();
    error_reporting(E_ALL);
    require_once("../classes/utilities.php");
    require_once("../classes/Admin.php");



    if(($_POST) && isset($_POST["btnlogin"])){
            $email = sanitizer($_POST["email"]);
            $pwd = $_POST["password"];

           $admin_confirmed= $admin->admin_login($email, $pwd);
           if($admin_confirmed){
                $_SESSION["adminonline"] = $admin_confirmed;
                header("location:../index.php");
                exit();
           }else{
                $_SESSION["errormessage"] = "Invalid login details";
                header("location:../login.php");
                exit();
           }
       
    }else{
        $_SESSION["errormessage"] = "Please provide your login details";
        header("location:../login.php");
        exit();
    }


?>