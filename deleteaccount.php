<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Account</title>
	<link rel="stylesheet" type="text/css" href="css/deleteaccount.css">
	<script src="https://kit.fontawesome.com/d4f4bc68b4.js" crossorigin="anonymous"></script>
</head>
<body>
	
	<form action="accountdelete.php" method="post">
		<h1>Delete Account</h1>
	<p>Are you sure you want to delete your account? This action cannot be undone.</p>
	<div class="input">
			<button type="submit" class="confirm-button" name="confirm" value="yes">
				Confirm
			</button>
		
		
			<span><a href="profile.php" class="cancel-button">cancel</a></span>
		
	</div>
	</form>
</body>
</html>
