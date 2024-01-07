<?php 
session_start(); 
include "login1.php";

if (isset($_POST['phone']) && isset($_POST['code'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$phone = validate($_POST['phone']);
	$pass = validate($_POST['code']);

	if (empty($phone)) {
		header("Location: connexion.php?error=Phone Number is required");
	    exit();
	}else if(empty($pass)){
        header("Location: connexion.php?error=Code is required");
	    exit();
	}else{
		$sql = "SELECT * FROM user WHERE phone='$phone' AND code='$pass'";

		$result = mysqli_query($conn, $sql);


		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['phone'] === $phone && $row['code'] === $pass) {
            	$_SESSION['phone'] = $row['phone'];
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['uid'];
            	header("Location: homepage1.php");
		        exit();
            }else{
				header("Location: connexion.php?error=Incorrect Phone number or code");
		        exit();
			}
		}else{
			header("Location: connexion.php?error=Incorrect Phone number or code");
	        exit();
		}
	}
	
}else{
	header("Location: connexion.php");
	exit();
}