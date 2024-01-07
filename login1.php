<?php 

$servername = "localhost";
$username = "root";
$pass = "";
$dbname="moneytransfer";
$conn = mysqli_connect($servername, $username, $pass, $dbname);
if(!$conn)
{
	echo"Connection failed";
}

 ?>
