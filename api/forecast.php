<?php

   $lat = $_REQUEST['lat'];
   $lon = $_REQUEST['lon'];

   $key = "51a0a9c57a0ff82eae187a4c93ba7d14";
   $data = file_get_contents("https://api.openweathermap.org/data/2.5/forecast?lat=".$lat."&lon=".$lon."&appid=".$key."");
   $data = json_decode($data,true);

   $insert = [];
   $check = [];

   foreach ($data['list'] as $key => $value) {
   	$timestamp = $value['dt'];
   	$date = date('Y-m-d', $timestamp);

   	if(!in_array($date, $check)){
   			foreach ($value['weather'] as $k => $v) {
   				$insert[] =[
   				"day" => date('l', strtotime($date)),
   				"temp" => ceil($value['main']['temp']-273.15),
   				"desc" => $v['description']
   			];
   			}
   		$check[] = $date;
   	}
   }

   $val = "";

   for($i=1; $i < count($insert); $i++){
   	$val .= '<div class="card new-card">
				<h2 class="day-name">'.$insert[$i]['day'].'</h2>
				<div class="card-icon">
					<img src="images/monday-icon.jpg" alt="">
				</div>
				<div class="day-temp">
					<h2 class="temp" id="temp2">'.$insert[$i]['temp'].'</h2>
						<span class="temp-unit">°C</span>
					</div>
			</div>'; 
   }

   echo $val;

?>