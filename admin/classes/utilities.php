<?php
    error_reporting(E_ALL);

    function sanitizer($evilstring){
        $cleaned = strip_tags($evilstring);
        $cleaned = trim($cleaned);
        $cleaned = htmlspecialchars($cleaned);
        return $cleaned;

    }

?>