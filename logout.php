<?php
    error_reporting(E_ALL);
    require_once("classes/User.php");


    $user->logout();
    header("location:index.php");

?>