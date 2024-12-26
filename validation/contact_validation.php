<?php
    include '../include/db_connect.php';
?>
<?php
    $error = "";
    $i = 0;
    if(isset($_REQUEST['contact'])){
        $database = $_REQUEST['db'];
    	$i = strlen($_REQUEST['contact']);
        $exp1 = preg_match('/[A-Za-z]/',$_REQUEST['contact']);
    	$exp2 = preg_match('/\W/', $_REQUEST['contact']);
        $sql = "select * from $database where contact = '".$_REQUEST['contact']."'";
        $result = mysqli_query($conn,$sql);

    	if($i != 10){
            $error = 1;
        }
        if($exp2){
    		$error = 2;
    	}
    	if(($i != 10) and $exp2){
    		$error = 3;
    	}
        if($exp1){
            $error = 4;
        }
        if(mysqli_num_rows($result) > 0){
            $error = 5;
        }

    	echo $error;
    }
?>