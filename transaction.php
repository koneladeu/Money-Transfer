<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>New transaction</title>
	<link rel="stylesheet" type="text/css" href="css/changepassword.css">
	<script src="https://kit.fontawesome.com/d4f4bc68b4.js" crossorigin="anonymous"></script>
</head>

<body>
	
		<form method="post" action="save_transaction.php">
			 <?php 
    // Check if there's an error message to display
    if (isset($_SESSION['error'])) {
        $error_msg = $_SESSION['error'];
        // Unset the error message after displaying it
        echo "<div class='error'>$error_msg</div>";
        echo "<script>
                setTimeout(function() {
                    var error_msg = document.querySelector('.error');
                    error_msg.style.display = 'none';
                }, 3000);
            </script>";
        unset($_SESSION['error']);
    }
    ?>
			 

		<h1>New Transaction</h1>
		<div class="input">
				
		<input type="text" name="receiver-number" placeholder="Enter receiver number" pattern="[0-9]*" maxlength="10" id="receiver-number" required="">

			
			<input type="number" name="amount" placeholder="Enter the Amount" pattern="[0-9]*" id="amount" step="100" min="100" required="">
			</div>

		
            <div align="center">
		<button type="submit" value="Save">Send</button><br><br>
		<span><a href="homepage1.php">cancel</a></span>
	</div>
			
		</form>
</body>
</html>
