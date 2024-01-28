<?php
 require_once "../classes/User.php";

    $state_id = $_GET['stateid'];
    

    $lgas = $user->getlga_bystate($state_id);
        

 
    foreach($lgas as $lga){
        $str = "<option>" . $lga["lga_name"] . "</option>";
    }

    echo $str;


?>