<?php
    $error = "";
    if(isset($_REQUEST['lname'])){
    	$exp1 = preg_match('/[0-9]/', $_REQUEST['lname']);
    	$exp2 = preg_match('/\W/', $_REQUEST['lname']);

    	if($exp1){
    		$error = 1;
    	}
    	if($exp2){
    		$error = 2;
    	}
    	if($exp1 and $exp2){
    		$error = 3;
    	}

    	echo $error;

    }
?>