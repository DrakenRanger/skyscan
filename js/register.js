$(document).ready(function(){
	$("#move").click(function(){
		location.href = "index.php";
	});

	function addCountry(){
		$.ajax({
			url : "api/country.php",
			type : "GET",
			dataType : "JSON",
			success : function(data){
				$.each(data, function(key,value){
					$("#country").append("<option>"+value+"</option>");
				});
			}
		});
	}
	addCountry();

	$("#country").change(function(){
		var c = $(this).val();
		$("#city option:not('#city-option')").remove();

		$.ajax({
			url : "api/iso3.php",
			type : "POST",
			data : {country : c},
			success : function(data){
				$("#iso3").val(data);
			}
		});

		$.ajax({
			url : "api/city.php",
			type : "POST",
			data : {country : c},
			dataType : "JSON",
			success : function(data){
				$.each(data, function(key,value){
					$("#city").append("<option>"+value+"</option>");
				});
			}
		})
	});

	//Validate First Name
		$(document).on("keyup", "#fname", function(){
			var val = $(this).val();
			$.ajax({
				url : "validation/fname_validation.php",
				type : "POST",
				data : {fname : val},
				success : function(data){
					if(data == 1){
						$("#fname_err").css("display","block");
						$("#fname_err").html("Name Doesn't content number");
						$("#status").val(1);
					}else if(data == 2){
						$("#fname_err").css("display","block");
						$("#fname_err").html("Name Doesn't content Special Character");
						$("#status").val(1);
					}else if(data == 3){
						$("#fname_err").css("display","block");
						$("#fname_err").html("Not A Valid Name");
						$("#status").val(1);
					}else{
						$("#fname_err").css("display","none");
						$("#status").val(0);
					}
				}
			});
		});

	//Validate Last Name
		$(document).on("keyup", "#lname", function(){
			var val = $(this).val();
			$.ajax({
				url : "validation/lname_validation.php",
				type : "POST",
				data : {lname : val},
				success : function(data){
					if(data == 1){
						$("#lname_err").css("display","block");
						$("#lname_err").html("Name Doesn't content number");
						$("#status").val(1);
					}else if(data == 2){
						$("#lname_err").css("display","block");
						$("#lname_err").html("Name Doesn't content Special Character");
						$("#status").val(1);
					}else if(data == 3){
						$("#lname_err").css("display","block");
						$("#lname_err").html("Not A Valid Name");
						$("#status").val(1);
					}else{
						$("#lname_err").css("display","none");
						$("#status").val(0);
					}
				}
			});
		});

	//Validate Contact Number
		$(document).on("keyup", "#contact", function(){
			var val = $(this).val();
			var db = 'register';
			$.ajax({
				url : "validation/contact_validation.php",
				type : "POST",
				data : {contact : val, db : db},
				success : function(data){
					if(data == 1){
						$("#contact_err").css("display","block");
						$("#contact_err").html("Number is 10 digit long");
						$("#status").val(1);
					}else if(data == 2){
						$("#contact_err").css("display","block");
						$("#contact_err").html("Number doesn't content special character");
						$("#status").val(1);
					}else if(data == 3){
						$("#contact_err").css("display","block");
						$("#contact_err").html("Not A Valid Number");
						$("#status").val(1);
					}else if(data == 4){
						$("#contact_err").css("display","block");
						$("#contact_err").html("Number doesn't content Alphabate");
						$("#status").val(1);
					}else if(data == 5){
						$("#contact_err").css("display","block");
						$("#contact_err").html("Number is already registered");
						$("#status").val(1);
					}else{
						$("#contact_err").css("display","none");
						$("#status").val(0);
					}
				}
			});
		})

	//Validate Email ID
		$(document).on("keyup", "#email", function(){
			var val = $(this).val();
			var db = 'register';
			$.ajax({
				url : "validation/email_validation.php",
				type : "POST",
				data : {email : val, db : db},
				success : function(data){
					if(data == 1){
						$("#email_err").css("display","block");
						$("#email_err").html("Not A Valid Email ID");
						$("#status").val(1);
					}else if(data == 2){
						$("#email_err").css("display","block");
						$("#email_err").html("Email ID is already registered");
						$("#status").val(1);
					}else{
						//alert(data);
						$("#email_err").css("display","none");
						$("#status").val(0);
					}
				}
			});
		})

	//Validate Password
	$(document).on("blur","#pass", function(){
		var val = $(this).val();
		$.ajax({
			url : "validation/pass_validation.php",
			type : "POST",
			data : {pass:val},
			success : function(data){
				if(data == 1){
					$("#pass_err").css("display","block");
					$("#pass_err").html("Password Must Be 8-20 character long");
					$("#status").val(1);
				}else if(data == 2){
					$("#pass_err").css("display","block");
					$("#pass_err").html("Password Must Be Contain A Special Character");
					$("#status").val(1);
				}else{
					//alert(data);
					$("#pass_err").css("display","none");
					$("#status").val(0);
				}
			}
		});
	});

	//Send Value To Database
	$("#register").click(function(){
		var data = $(document.getElementById("register_form"));
		var formData = new FormData(data[0]);
		$.ajax({
			url : "model/register.php",
			type : "POST",
			data : formData,
			contentType : false,
			processData : false,
			success : function(data){
				if(data == 1){
					$("#danger_alert").html("Please Fill The Form Carefully");
					$("#danger_alert").css("display","block");
				}else if(data == 2){
					$("#danger_alert").html("Please Fill All The Fields");
					$("#danger_alert").css("display","block");
					$("#status").val(1);
				}else if(data == 3){
					$("#danger_alert").html("Email Id is already registered");
					$("#danger_alert").css("display","block");
					$("#email_err").css("display","block");
					$("#email_err").html("Email ID is already registered");
				}else if(data == 4){
					$("#danger_alert").html("Contact Number is already registered");
					$("#danger_alert").css("display","block");
					$("#contact_err").css("display","block");
					$("#contact_err").html("Contact Number is already registered");
				}else if(data == 5){
					$("#danger_alert").html("Unable to Register Try Some Time Later");
					$("#danger_alert").css("display","block");
				}else{
					alert(data);
					if($("#danger_alert").css("display") == "block"){
						$("#danger_alert").css("display","none");
					}

					$("#success_alert").html("Register Successfully!! <a href='index.php'>Click here to login</a>");
					$("#success_alert").css("display","block");
					$('#register_form input').val('');
				}
			}
		});
	});	
});