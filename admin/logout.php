<?php
    error_reporting(E_ALL);
    session_start();

    require_once("classes/Admin.php");

    $admin->admin_logout();
    header("location:login.php");

 
?>