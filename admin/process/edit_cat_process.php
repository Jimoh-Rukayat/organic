<?php
     session_start();
     error_reporting(E_ALL);
     require_once ("../classes/utilities.php");
     require_once("../classes/Category.php");

        
   
     if($_POST && isset($_POST["btn_edit"])){

          if(isset($_GET["edit"])){
              $cat_id= $_GET["edit"];
          }else{
            echo "Category not found";
          }
        
         $cat_name = sanitizer($_POST["cat_name"]);
         $cat_id = $_POST["cat_id"];

         $resp= $cat->edit_category($cat_id, $cat_name);
         if($resp)
         {
             $_SESSION["success_msg"] = "Category updated successfully";
              header("location:../categories.php");
              exit();
         }else{
             $_SESSION["errormessage"] = "Update Failed!";
              header("location:../edit_cat.php");
              exit();
         }
        
     }else{
        
          $_SESSION["errormessage"] = "Update Failed!";
              header("location:../edit_cat.php");
              exit();
     }




?>

