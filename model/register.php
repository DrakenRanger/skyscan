<?php
   include "../include/db_connect.php";
?>
<?php

    if($_REQUEST['status'] == 1){
    	echo 1;
    }else{
    	if($_REQUEST['fname'] == "" || $_REQUEST['lname'] == "" || $_REQUEST['email'] == "" || $_REQUEST['contact'] == "" || $_REQUEST['password'] == "" || empty($_REQUEST['country']) || empty($_REQUEST['city']) || $_REQUEST['iso3'] == ""){
    		echo 2;
    	}else{
    		$insert = [
    			"name" => $_REQUEST['fname']." ".$_REQUEST['lname'],
    			"email" => $_REQUEST['email'],
    			"contact" => $_REQUEST['contact'],
    			"password" => password_hash($_REQUEST['password'], PASSWORD_BCRYPT),
    			"country" => $_REQUEST['country'],
    			"city" => $_REQUEST['city'],
    			"iso3" => $_REQUEST['iso3']
    		];

    		$sql = "select * from register where email = '".$insert['email']."'";
    		$result = mysqli_query($conn,$sql);

    		if(mysqli_num_rows($result) != 0){
    			echo 3;
    		}else{
    			$sql = "select * from register where contact = '".$insert['contact']."'";
    		    $result = mysqli_query($conn,$sql);

    		    if(mysqli_num_rows($result) != 0){
    		    	echo 4;
    		    }else{
    		    	$rows = implode(",", array_keys($insert));
    		    	$values = implode('","',array_values($insert));

    		    	$sql = 'insert into register('.$rows.') values("'.$values.'")';
    		    	if(mysqli_query($conn,$sql)){
    		    		echo 6;
    		    	}else{
    		    		echo 5;
    		    	}
    		    }
    		}
    	}
    }

?>