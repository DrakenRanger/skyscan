<?php
    include '../include/db_connect.php';
?>
<?php
    $error = "";
    $i = 0;
    if(isset($_REQUEST['email'])){
        $database = $_REQUEST['db'];
        $sql = "select * from $database where email = '".$_REQUEST['email']."'";
        $result = mysqli_query($conn,$sql);
        $exp1 = preg_match_all('/\w+\@+(gmail|myyahoo|yahoo|outlook)+\.com/i', $_REQUEST['email'],$array);

    	if(!isset($array[0][0])){
            $error = 1;
        }
        if(mysqli_num_rows($result) != 0){
            $error = 2;
        }

    	echo $error;
    }
?>