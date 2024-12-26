<?php
  session_start();
  include "../include/db_connect.php";
?>
<?php

    if($_REQUEST['email'] == "" || $_REQUEST['pass'] == ""){
    	echo 1;
    }else{
    	$email = $_REQUEST['email'];
    	$pass = $_REQUEST['pass'];

    	$sql = "select * from register where email = '".$email."'";
    	$result = mysqli_query($conn,$sql);

    	if(mysqli_num_rows($result) == 0){
    		echo 2;
    	}else{
    		$data = mysqli_fetch_assoc($result);

    		if(!password_verify($pass, $data['password'])){
    			echo 3;
    		}else{
    			$_SESSION['email'] = $email;
    			$_SESSION['is_login'] = true;

          if(isset($_REQUEST['remember'])){
            $path = "/";
            setcookie('pass',$pass,time()+86400*365,$path);
            setcookie('email',$email,time()+86400*365,$path);
          }

    			echo 4;
    		}
    	}
    }

?>