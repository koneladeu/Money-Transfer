<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script src="https://kit.fontawesome.com/d4f4bc68b4.js" crossorigin="anonymous"></script>
</head>
<body>
	<form action="login2.php" method="post">
		<img class="logo" src="wolfpay3.png" alt="Logo" />
		<h1>Login</h1>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"> <?php echo $_GET['error']; ?> </p>
			
		<?php  } ?>

		<div class="media">
			<p><i class="fa-brands fa-google"></i></p>
			<p><i class="fa-brands fa-facebook"></i></p>
			<p><i class="fa-brands fa-twitter"></i></p>
			<p><i class="fa-brands fa-instagram"></i></p>
		</div>
		<p class="email">Use My Phone Number:</p>

	<div class="input">
		<input type="tel" name="phone" placeholder="Phone Number" pattern="[0-9]*" maxlength="10">
		<input type="password" name="code" placeholder="Code" pattern="[0-9]*" maxlength="4">
	</div>

	<p class="register">
		D'ont have an <span>Account</span>? <span><a href="register.html">Register Now!</a></span>
			
	</p>
	<p class="forget">
		Forgot your <span>Code</span>?
		<span><a href="forgetpassword.php">Reset it Now!</a></span>
	</p>
	<div align="center">
		<button type="submit">Login</button>
	</div>
	</form>
	
</body>
</html>