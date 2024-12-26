<?php

    $error = '';
    if(isset($_REQUEST['pass'])){
    	$s = strlen($_REQUEST['pass']);
    	$exp1 = preg_match('/\W/',$_REQUEST['pass']);

    	if(!($s >= 8 && $s <= 20)){
    		$error = 1;
    	}else{
    		if(!$exp1){
    		  $error = 2;
    	    }
    	}

    	echo $error;
    }

?>