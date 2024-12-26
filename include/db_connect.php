<?php

    const SERVERNAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";
    const DATABASE = "skyscan";

    $conn = mysqli_connect(SERVERNAME,USERNAME,PASSWORD,DATABASE) or die("Connection Failed");

?>