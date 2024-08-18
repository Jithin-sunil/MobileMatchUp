<?php
$servername="localhost";
$username="root";
$password="";
$database="db_mobilematchup";
$con=mysqli_connect($servername,$username,$password,$database);


if(!$con){
	echo "Connection Failed";
	}
?>


