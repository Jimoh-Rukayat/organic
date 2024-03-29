<?php
    require_once "Db.php";

    class Payment extends Db{
        private $dbconn;

        public function __construct(){
            $this->dbconn = $this->connect();

        }

        public function paystack_initialize($amount, $email, $ref){
            
            $postRequest = array("amount" => $amount * 100, "email" => $email, "reference" => $ref);
            
            $headers= ["Content-Type: application/json", "Authorization: Bearer sk_test_435de7b5730f4af9d2f6bbbe319ac041c7535a2a"];
            $ch = curl_init("https://api.paystack.co/transaction/initialize");
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postRequest));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $apiResponse = curl_exec($ch); 
            if($apiResponse){
                curl_close($ch);
                return json_decode($apiResponse);
            }else{
                $r = curl_error($ch);
                return false;
            }
        }

        public function paystack_verify($ref){
            $headers= ["Content-Type: application/json", "Authorization: Bearer sk_test_435de7b5730f4af9d2f6bbbe319ac041c7535a2a"];
            $ch = curl_init("https://api.paystack.co/transaction/verify/$ref"); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $apiResponse = curl_exec($ch);
            if($apiResponse){
                return json_decode($apiResponse);
            }else{
                return false;
            }
        }

        public function payment_details($amount, $order_id, $user_id){
            $sql = "INSERT INTO payment(pay_amt, order_id, user_id) VALUES(?,?,?)";
            $stmt = $this->dbconn->prepare($sql);
           $response = $stmt->execute([$amount, $order_id, $user_id]);
            return $response;
        }
    }

    


?>