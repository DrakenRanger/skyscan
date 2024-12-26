<?php
include 'include/is_user_login.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="images/logo/logo.png">
		<link rel="stylesheet" href="css/home.css">
		<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
		<!-- Jquery Source File -->
		<script type="text/javascript" src="jquery/jquery.js"></script>
		<!-- JS File -->
		<script type="text/javascript" src="js/home.js"></script>
		<title>SkyScan</title>
	</head>
	<body>
		<div class="wrapper">
			<div class="sidebar">
				<div>
					<form action="" class="search" id="search">
						<input type="text" id="search_box" placeholder="search.....">
						<button type="button" id="btn-search">
						<i class='bx bx-search' ></i>
						</button>
						<br>
						<div>
							<div class="suggestion-box">
								<ul id="suggest"></ul>
							</div>
						</div>
					</form>
					<div class="weather-icon">
						<img src="images/weather-icon.jpg" alt="" >
					</div>
					<div class="temperature">
						<h1 id="temp">0</h1>
						<span class="temp-unit">°C</span>
					</div>
					<div class="date-time">
						<p id="date-time">
							Monday. 12:00
						</p>
					</div>
					<div class="divider"></div>
					<div class="condition-rain">
						<div class="condition">
							<i class='bx bxs-cloud'></i>
							<div class="condition" id="condition">condition</div>
						</div>
						<div class="rain">
							<i class='bx bxs-droplet'></i>
							<p id="rain">perc - <span id="perc"></span></p>
						</div>
					</div>
					<div class="location">
						<div class="location-icon">
							<i class='bx bxs-map' ></i>
						</div>
						<div class="locatin-text">
							<p class="locatin">location<br><span id="loc"></span></p>
						</div>
					</div>
				</div>
			</div>
			<div class="main">
				<nav>
					<ul class="option">
						<button class="hourly">Today</button>
						<button class="week active" id="forecast">5 Days Forecast</button>
					</ul>
					<ul class="units">
						<button class="celcius active">°C</button>
						<button class="fahrenheit">°F</button>
						<button class="logout">Logout</button>
					</ul>
				</nav>
				<div class="cards" id="weather-cards">
					<div class="card">
						<h2 class="day-name">Monday</h2>
						<div class="card-icon">
							<img src="images/monday-icon.jpg" alt="">
						</div>
						<div class="day-temp">
							<h2 class="temp" id="temp2">32</h2>
							<span class="temp-unit">°C</span>
						</div>
					</div>
				</div>
				<div class="hightlight">
					<h2 class="heading">today's hightlight</h2>
					<div class="cards">
						<div class="card2">
							<h4 class="card-heading">Clouds</h4>
							<div class="content">
								<p class="clouds">0</p>
								<p class="UV-"></p>
							</div>
						</div>
						<div class="card2">
							<h4 class="card-heading">Wind Status</h4>
							<div class="content">
								<p class="wind-speed">0</p>
								<p class=""></p>
							</div>
						</div>
						<div class="card2">
							<h4 class="card-heading">Sunrise & Sunset</h4>
							<div class="content">
								<p class="sunrise">0</p>
								<p class="sunset"></p>
							</div>
						</div>
						<div class="card2">
							<h4 class="card-heading">Humidity</h4>
							<div class="content">
								<p class="humidity">0</p>
								<p class="humidity-status"></p>
							</div>
						</div>
						<div class="card2">
							<h4 class="card-heading">Visibility</h4>
							<div class="content">
								<p class="visibility">0</p>
								<p class="Visibility-status"></p>
							</div>
						</div>
						<div class="card2">
							<h4 class="card-heading">Feels Like</h4>
							<div class="content">
								<p class="feels-like">
									<span id="feels-like"></span>
									<span class="temp-unit">°C</span>
								</p>
								<p class="air-quality-status"></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<form id="location_form">
				<input type="hidden" name="lat" id="lat">
				<input type="hidden" name="lon" id="lon">
			</form>
		</body>
	</html>