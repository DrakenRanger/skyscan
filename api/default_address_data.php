<?php
   include "../include/db_connect.php";
   session_start();
?>

<?php

    $sql = "select * from register where email = '".$_SESSION['email']."'";
    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_assoc($result);
    $city = $row['city'];
    $iso3 = $row['iso3'];
    $pin = "51a0a9c57a0ff82eae187a4c93ba7d14";

    $data = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$city.",".$iso3."&appid=".$pin."");
    $data = json_decode($data,true);
    $date = explode(" ",date("Y-m-d H:i:s", $data['dt']));

    $array = [
      "date" => $date[0],
      "day" => date("l", strtotime($date[0])),
      "temp" => ceil(($data['main']['temp']-272.15)),
      "condition" => $data['weather'][0]['description'],
      "lat" => $data['coord']['lat'],
      "lon" => $data['coord']['lon'],
      "perc" => $data['main']['humidity'],
      "wind" => $data['wind']['speed'],
      "visibility" => $data['visibility'],
      "humidity" => $data['main']['humidity'],
      "sunrise" => date("H:i:s",$data['sys']['sunrise']+$data['timezone']),
      "sunset" => date("H:i:s",$data['sys']['sunset']+$data['timezone']),
      "clouds" => $data['clouds']['all'],
      "feels_like" => ceil($data['main']['feels_like'] - 272.15),
    ];

    echo json_encode($array);

?>