<?php
        session_start();
        error_reporting(E_ALL);
        require_once "../classes/utilities.php";
        require_once "../classes/Order.php";
        require_once "../classes/Payment.php";

        
    if(isset($_SESSION["user_id"])){
        $user_id = $_SESSION["user_id"];
    }


        if($_POST["btnsubmit"] && isset($_POST["btnsubmit"])){

            $fullname = sanitizer($_POST["fullname"]);
            $email = sanitizer($_POST["email"]);
            $address = sanitizer($_POST["address"]);
            $phone = sanitizer($_POST["phone_no"]);
            $amount = $_POST["amt"];
            $user_id = $_SESSION["user_id"];
            $ref = uniqid(date("Y"));
            $_SESSION["order_ref_no"] = $ref;
            $state = $_POST["location"];

           

            if(empty($fullname) || empty($email) || empty($address) || empty($phone) || empty($amount)){
                $_SESSION["errormessage"] = "All fields are required!";
                header("location:../checkout.php");
                exit();
            }

            $order = new Order();
            $resp = $order->order_details($fullname, $email, $address,  $state, $amount, $user_id, $phone, $ref);
            if($resp){
                header("location:../confirmation.php");
                exit();

                }else{
                    $_SESSION["errormessage"] = "Please complete the form";
                    header("location:../checkout.php"); 
                    exit();
            }
         

        }else{

            header("location:../checkout.php");
            exit();
           
        }



?>