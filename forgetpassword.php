

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Forget Password</title>
	<link rel="stylesheet" type="text/css" href="css/forgetpassword.css">
	<script src="https://kit.fontawesome.com/d4f4bc68b4.js" crossorigin="anonymous"></script>
</head>
<body>
	<form method="post" action="resetpassword.php">
		<h1>Forgot Password</h1>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"> <?php echo $_GET['error']; ?> </p>
			
		<?php  } ?>
		<div class="input">
			<label for="email">Email:</label>
		<input type="email" id="email" name="email" placeholder="Enter Your Email" required><br><br>
		</div>
		<div align="center">
		<button type="submit">Reset Password</button><br><br>
	</div>
	<div align="center">
		<a href="connexion.php">
		<button type="button">Cancel</button>
		</a>
		</div>
	</form>

</body>
</html>
