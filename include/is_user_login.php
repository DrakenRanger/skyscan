<?php

   session_start();
   if(!isset($_SESSION['is_login'])){
   	echo "<script>
   	  location.href = 'index.php';
   	</script>";
   }

?>