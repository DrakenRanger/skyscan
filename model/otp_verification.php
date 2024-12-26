<?php
   include '../include/db_connect.php';
?>
<?php

   if($_REQUEST['otp'] == ''){
      echo 1;
   }else{
      $sql = "select * from otp where email = '".$_REQUEST['email']."' and otp = '".$_REQUEST['otp']."'";
      $result = mysqli_query($conn,$sql);

      if(mysqli_num_rows($result) == 0){
         echo 2;
      }else{
         echo 3;
      }
   }

?>