<?php
    session_start();
    error_reporting(E_ALL);
    require_once("../classes/utilities.php");
    require_once("../classes/Category.php");

    if($_POST && isset($_POST["btn_add"])){
        $name = sanitizer($_POST["name"]);


       $res= $cat-> add_category($name);
       if($res){
            $_SESSION["success_msg"] = "Added successfully";
            header("location:../categories.php");
            exit();
        }else{
            $_SESSION["errormessage"] = "Upload Failed!";
            header("location:../add_category.php");
            exit();
            
        }

        
    }

       
   


?>