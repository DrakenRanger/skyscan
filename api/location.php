<?php
    
    $response = file_get_contents('https://httpbin.org/ip');
    $data = json_decode($response, true);
    $ip = $data['origin'];
    $key = "838e212460c44e758330e2a6b382a934";

    $data = file_get_contents("https://api.ipgeolocation.io/ipgeo?apiKey=".$key."&ip=".$ip."");
    $data = json_decode($data,true);

    $loc = [
    	"lat" => $data['latitude'],
    	"lon" => $data['longitude']
    ];

    echo json_encode($loc);

?>