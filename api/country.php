<?php

    $country = file_get_contents("https://countriesnow.space/api/v0.1/countries");
    $country = json_decode($country, true);
    
    //echo "<pre>";
    //print_r($country);

    foreach ($country['data'] as $key => $value) {
       $cou[] = $value['country']; 
    }

    echo json_encode($cou);
?>