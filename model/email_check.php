<?php
   include '../include/db_connect.php';
?>
<?php

   if($_REQUEST['email'] == ''){
   	echo 1;
   }else{
   	$database = $_REQUEST['db'];
   	 $insert = [
   	 	"email" => $_REQUEST['email'],
   	 	"otp" => null,
   	 ];

       $sql = "select * from otp where email = '".$insert['email']."'";
       $result = mysqli_query($conn,$sql);

       if(mysqli_num_rows($result) > 0){
         $sql = "delete from otp where email = '".$insert['email']."'";
         mysqli_query($conn,$sql);
       }

   	 $sql = "select * from $database where email = '".$insert['email']."'";
   	 $result = mysqli_query($conn,$sql);

   	 if(mysqli_num_rows($result) == 0){
   	 	echo 2;
   	 }else{
   	 	$to = $insert['email'];
   	 	$subject = "OTP Verification Login From JobMartOnline";
   	 	$message = "**[Privacy Alert: Please Don't Share This OTP With Anyone{OTP From SkyScan}]** \n\n Your Verification One Time Password Is: ".$insert['otp']=rand(1000, 9999);
   	 	$header = "From : jobmart123456@gmail.com";

   	 	if(mail($to,$subject,$message,$header)){
   	 		$row = implode(",",array_keys($insert));
   	 		$values = implode("','", array_values($insert));
   	 		$sql = "insert into otp($row) values('".$values."')";

   	 		if(mysqli_query($conn,$sql)){
   	 			echo 5;
   	 		}else{
   	 			echo 4;
   	 		}
   	 	}else{
   	 		echo 3;
   	 	}
   	 }
   }

?>