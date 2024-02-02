<?php
    require_once("classes/Category.php");

    if(isset($_POST["delete"])){

        $cat_id = $_POST["del_cat"];

        $response = $cat->delete_category($cat_id);
        if($response){
            header("location:categories.php");
            exit();
        }else{
            $_SESSION["errormessage"] = "Failed to delete";
            header("location:categories.php");
            exit();
        }
    }
    

   




?>