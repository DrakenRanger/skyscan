$(document).ready(function(){
	$("#move").click(function(){
		location.href = "register.php";
	});

	$("#login").click(function(){
		var data = $(document.getElementById("loginForm"));
		var form = new FormData(data[0]);

		$.ajax({
			url : "model/login.php",
			type : "POST",
			data : form,
			contentType : false,
			processData : false,
			success : function(data){
				if(data == 1){
					$("#danger_alert").html("Please Fill All The Fields");
					$("#danger_alert").css("display","block");
				}else if(data == 2){
					$("#danger_alert").html("You Don't Have Any Account!! <a href='register.php'>Register Now?</a>");
					$("#danger_alert").css("display","block");
				}else if(data == 3){
					$("#danger_alert").html("Invalid Details!!!");
					$("#danger_alert").css("display","block");
				}else if(data == 4){
					location.href = 'home.php';
				}else{
					alert(data);
				}
			}
		});
	});

/*=====================================OTP Validation=========================================*/
	//Function For Get OTP For User
    function getOTP(email,database){
    	$.ajax({
    		url : "model/email_check.php",
    		type : "POST",
    		data : {email:email, db : database},
    		success : function(data){
    			if(data == 1){
    				$("#email_valid_err").html("Please Fill The Field");
    			}else if(data == 2){
    				$("#email_valid_err").html("Wrong Email ID");
    			}else if(data == 3 || data == 4){
    				$("#email_valid_err").html("Some Error Occurs Try Again Sometime Later");
    			}else if(data == 5){
    				$("#check_email_present").modal("hide");
    				$("#otp_verification").modal("show");
    				$("#otp_email").val(email);
    				$("#update_pass_email").val(email);
    				$("#wait").css("display","none");
    			}else{
    				alert(data);
    			}
    		}
    	});
    }

    //For User
    $(document).on("click", "#check_email_btn", function(){
    	var email = $("#check_email").val();
    	var database = "register";
    	$("#wait").css("display","block");
    	$("#wait").html("<center>Please Wait....</center>");
    	getOTP(email,database);
    });

    //Resend OTP For User
    $(document).on("click", "#resend_otp_user", function(){
    	var email = $("#otp_email").val();
    	var database = "register";
    	$("#note").html("Please Wait.....");
    	setTimeout(function(){
    		$("#note").html("Check Your Email Again!!!");
    		getOTP(email,database);
    	},8000);
    });

    //Check OTP Valid Or Not
    $(document).on("click", "#check_otp_valid_btn", function(){
    	var email = $("#otp_email").val();
    	var otp = $("#otp").val();

    	$.ajax({
    		url : "model/otp_verification.php",
    		type : "POST",
    		data : {otp:otp, email:email},
    		success : function(data){
    			if(data == 1){
    				$("#otp_err").html("Please Fill The Field");
    			}else if(data == 2){
    				$("#otp_err").html("Wrong Details Try Agian");
    			}else{
    				$("#otp_verification").modal("hide");
    				$("#update_password").modal("show");
    			}
    		}
    	});
    });
    function updatePass(form){
    	$.ajax({
    		url : "model/update_password.php",
    		type : "POST",
    		data : form,
    		processData : false,
    		contentType : false,
    		success : function(data){
    			if(data == 1){
    				$("#upd_danger").css("display","block");
    				$("#upd_danger").html("Please Fill All The Fields");
    			}else if(data == 2){
    				$("#upd_danger").css("display","block");
    				$("#upd_danger").html("Password & Confirm Password Must Be Same");
    			}else if(data == 4){
    				$("#upd_danger").css("display","block");
    				$("#upd_danger").html("Some Error Occurs");
    			}else{
    				alert(data);
    				if($("#upd_danger").css("display") == "block"){
    					$("#upd_danger").css("display","none");
    				}

    				$("#upd_success").css("display","block");
    				$("#upd_success").html("Password Updated Successfully!! Now Login");
    			}
    		}
    	})
    }

    $("#update_pass_btn").click(function(){
       var data = $(document.getElementById("updatePass"));
       var formData = new FormData(data[0]);
       updatePass(formData);
    });
});