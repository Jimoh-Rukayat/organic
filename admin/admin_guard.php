<?php
        if(!isset($_SESSION["adminonline"])){
            $_SESSION["errormessage"] = "You must be logged in as an admin in order to access this page";
            header("location:login.php");
            exit();
        }

?>



