<?php
   include "../include/db_connect.php";
?>
<?php

    if($_REQUEST['pass'] == "" || $_REQUEST['con_pass'] == ""){
    	echo 1;
    }else{
    	$pass = $_REQUEST['pass'];
    	$con_pass = $_REQUEST['con_pass'];
    	$email = $_REQUEST['email'];

    	if($pass != $con_pass){
    		echo 2;
    	}else{
    		$pass = password_hash($pass, PASSWORD_BCRYPT);
    		$con_pass = password_hash($con_pass, PASSWORD_BCRYPT);
    		$sql = 'update register set password = "'.$pass.'" where email = "'.$email.'"';

    		if(mysqli_query($conn,$sql)){
    			echo 3;
    		}else{
    			echo 4;
    		}
    	}
    }

?>