<?php

   if(isset($_REQUEST['country'])){
   	$country = file_get_contents("https://countriesnow.space/api/v0.1/countries");
    $country = json_decode($country, true);

    foreach ($country['data'] as $key => $value) {
        foreach($value['cities'] as $city){ 
            if($value['country'] == $_REQUEST['country']){
                $iso = $value['iso3'];
                goto xyz;
            }
        }
    }

    xyz:
    echo $iso;
   }

?>