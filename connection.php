<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword ="";
$dbName = "august_user_management";
$port = 5600;

$connection = mysqli_connect($hostName,$dbUser,$dbPassword,$dbName,$port);

//connection error
if($connection->connect_errno){
    echo "Error " . mysqli_connect_error();
}


?>