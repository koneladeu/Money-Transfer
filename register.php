<?php 
session_start();
//$servername = "localhost";
//$username = "root";
//$pass = "";
//$dbname="sophter";
//header('location:index.html');
$con = mysqli_connect('localhost', 'root', '', 'moneytransfer');
//$con=new mysqli($servername, $username, $pass);
mysqli_select_db($con, 'moneytransfer');
$name=$_POST['name'];
$Email=$_POST['email'];
$phone=$_POST['phone'];
$Pass=$_POST['code'];

$s= "SELECT * FROM user where phone = '$phone'";
$result= mysqli_query($con, $s);
$num = mysqli_num_rows($result);
if($num > 0){
	echo "Phone Already Taken";
}else{

	$reg= "INSERT INTO user(name, email, phone, code, acc_create_date) VALUES ('$name','$Email','$phone','$Pass', NOW());";
	mysqli_query($con, $reg);
	$_SESSION['name'] = $name;
	header("Location: homepage1.php");
		        exit();

}

 ?>
