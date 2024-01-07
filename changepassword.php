<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Change password</title>
	<link rel="stylesheet" type="text/css" href="css/changepassword.css">
	<script src="https://kit.fontawesome.com/d4f4bc68b4.js" crossorigin="anonymous"></script>
</head>
<body>
	
	<form method="post" action="passwordchange.php">
		<h1>Change Password</h1>
		 <?php if (isset($_GET['error'])) { ?>
			<p class="error"> <?php echo $_GET['error']; ?> </p>
			
		<?php  } ?>
		<div class="input">
			<label for="old_password">Old Password:</label>
		<input type="password" id="old_password" name="old_password"
		placeholder="Enter Your Old Password" pattern="[0-9]*"  maxlength="4"  required><br><br>
		<label for="new_password">New Password:</label>
		<input type="password" id="new_password" name="new_password"
		placeholder="Enter Your New Password" pattern="[0-9]*"  maxlength="4" required><br><br>
		<label for="confirm_password">Confirm Password:</label>
		<input type="password" id="confirm_password" name="confirm_password"
		placeholder="Confirm Your Password" pattern="[0-9]*"
		maxlength="4" required><br><br>
		</div>
		<div align="center">
		<button type="submit">Change Password</button><br><br>
	</div>
	<div align="center">
		<button type="button" onclick="goBack()">Cancel</button>
		</div>
		
	</form>
	<script>
		function goBack() {
		  window.history.back();
		}
	</script>
</body>
</html>
