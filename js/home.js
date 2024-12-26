$(document).ready(function(){
	function ready(){
		$.ajax({
			url : "api/default_address_data.php",
			type : "POST",
			dataType : "JSON",
			success : function(data){
				$("#temp").html(data.temp);
				$("#date-time").html(data.day+":"+data.date);
				$(".day-name").html(data.day);
				$("#temp2").html(data.temp);
				$(".visibility").html(data.visibility);
				$(".humidity").html(data.humidity);
				$(".wind-speed").html(data.wind);
				$(".sunrise").html(data.sunrise);
				$(".sunset").html(data.sunset);
				$(".clouds").html(data.clouds);
				$("#feels-like").html(data.feels_like);
				$("#perc").html(data.perc+"%");
				$("#condition").html(data.condition);
				$("#lat").val(data.lat);
				$("#lon").val(data.lon);
			}
		});
	}
	ready();

	//Function For Forecast
	function foreCast(form){
		$.ajax({
			url : "api/forecast.php",
			type : "POST",
			data : form,
			processData : false,
			contentType : false,
			success : function(data){
				$("#weather-cards").append(data);
			}
		});
	}

	//Adding The Forecast Value
	$("#forecast").click(function(){
		$(".new-card").remove();
		var data = $(document.getElementById("location_form"));
		var form = new FormData(data[0]);
		foreCast(form);
	});

	//Remove the forecast value
	$(".hourly").click(function(){
		$(".new-card").remove();
	});

	//fetch Location
	$(".locatin").click(function(){
		$.ajax({
			url : "api/location.php",
			type : "POST",
			dataType : "JSON",
			success : function(data){
				$("#lat").val(data.lat);
				$("#lon").val(data.lon);
				var data = $(document.getElementById("location_form"));
		        var form = new FormData(data[0]);
		        getWeatherData(form);
			}
		})
	});

	//Get Weather Report Of Any Place
	function getWeatherData(form){
		$.ajax({
			url : "api/weather_data.php",
			type : "POST",
			data : form,
			processData : false,
			contentType : false,
			dataType : "JSON",
			success : function(data){
				$("#temp").html(data.temp);
				$("#date-time").html(data.day+":"+data.date);
				$(".day-name").html(data.day);
				$("#temp2").html(data.temp);
				$(".visibility").html(data.visibility);
				$(".humidity").html(data.humidity);
				$(".wind-speed").html(data.wind);
				$(".sunrise").html(data.sunrise);
				$(".sunset").html(data.sunset);
				$(".clouds").html(data.clouds);
				$("#feels-like").html(data.feels_like);
				$("#perc").html(data.perc+"%");
				$("#condition").html(data.condition);
				$("#lat").val(data.lat);
				$("#lon").val(data.lon);
			}
		});
	}

	$("#search_box").on("input", function(){
    var d = $(this).val();
    if(d == null) {
            // If search box is empty, hide the suggestion box
            $(".suggestion-box").css("display","none");
        } else {
            // If search box has a value, perform AJAX request
            $.ajax({
                url : "api/all_city.php",
                type : "POST",
                data : {data : d},
                success : function(data){
                    $("#suggest").html(data);
                    $(".suggestion-box").css("display","block");
                }
            });
        }
    });

    //Set The Selecting Value
    $(document).on("click","#suggest li", function(){
    	var data = $(this).html();
    	$("#search_box").val(data);
    	$(".suggestion-box").css("display","none");
    });

    $("#btn-search").click(function(){
    	var d = $("#search_box").val();

    	$.ajax({
    		url : "api/any_location_weather.php",
    		type : "POST",
    		data : {data : d},
    		dataType : "JSON",
    		success : function(data){
    			if(data == 1){
    				alert("Sorry! We Don't have any information about this");
    			}else{
    				$("#temp").html(data.temp);
				    $("#date-time").html(data.day+":"+data.date);
				    $(".day-name").html(data.day);
				    $("#temp2").html(data.temp);
				    $(".visibility").html(data.visibility);
				    $(".humidity").html(data.humidity);
				    $(".wind-speed").html(data.wind);
				    $(".sunrise").html(data.sunrise);
				    $(".sunset").html(data.sunset);
				    $(".clouds").html(data.clouds);
				    $("#feels-like").html(data.feels_like);
				    $("#perc").html(data.perc+"%");
				    $("#condition").html(data.condition);
				    $("#lat").val(data.lat);
				    $("#lon").val(data.lon);
    			}
    		}
    	});
    });

    //Log Out
    $(".logout").click(function(){
    	location.href = "logout.php";
    });

    //Farenhite
    $(".fahrenheit").click(function(){
    	if($(".temp-unit").html() == "°F"){
    		alert("Action Already Taken");
    	}else{
    		$('.celcius').removeClass('active');
    		$('.fahrenheit').addClass('active');
    		var data = $("#temp").html();
    	    data = (data * 9/5) + 32;
    	    $("#temp").html(data);
    	    $(".temp-unit").html("°F");
    	}
    });

    //celsius
    $(".celcius").click(function(){
    	if($(".temp-unit").html() == "°C"){
    		alert("Action Already Taken");
    	}else{
    		$('.fahrenheit').removeClass('active');
    		$('.celcius').addClass('active');
    		var data = $("#temp").html();
    	    data = (data - 32) * 5/9;
    	    $("#temp").html(data);
    	    $(".temp-unit").html("°C");
    	}
    });


});