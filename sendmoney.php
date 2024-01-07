<?php
session_start(); 
require_once 'connect_db.php';
require_once 'transaction.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$receiver_name = $_POST["receiver_name"];
	$receiver_email = $_POST["receiver_email"];
	$amount = $_POST["amount"];

	// Connect to your payment gateway here and initiate the money transfer
	// You would need to replace this code with the appropriate code for your chosen payment gateway

	// After the transfer is complete, you can redirect the user to a confirmation page
	//header("Location: confirmation.php");
	exit();
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Send Money</title>
</head>
<body>

</body>
<link rel="stylesheet" type="text/css" href="css/sendmoney.css">

</html>

