<?php

    if(!(isset($_SESSION["useronline"]))){
        $_SESSION["userfeedback"] = "You must be logged in in order to access this page.";

        header("location:cart.php");
        exit();
    }
    

    
?>








