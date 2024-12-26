<?php
  if($_REQUEST['data'] != ""){
    $data = $_REQUEST['data'];
    $country = file_get_contents("https://countriesnow.space/api/v0.1/countries");
    $country = json_decode($country, true);
    $cities = [];

    foreach ($country['data'] as $key => $value) {
       foreach($value['cities'] as $city){ 
           $cities[] = $city;
       }
    }

    $matches = [];

    foreach($cities as $city){
        if(stripos($city, $data) !== false){
            $matches[] = $city; // Add matching city to $matches array
        }
    }

    if(count($matches) > 0){
       echo '<ul>';
       foreach($matches as $match){
           echo '<li>' . $match . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<li>No matching results found</li>';
    }
   }
?>
