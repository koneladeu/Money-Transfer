<?php
if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    $to = "christopherzoungrana@gmail.com"; 
    $subject = "New Contact Message";
    
    $email_body = "You have received a new message from $name.\n\n"."Here is the message:\n\n$message";
    
    $headers = "From: $email \r\n";
    
    if (mail($to,$subject,$email_body,$headers)) {
        echo "Thank you for contacting us! We will get back to you shortly.";
    } else {
        echo "Failed to send message. Please try again later.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>contact</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="css/contact.css">
	<script src="https://kit.fontawesome.com/d4f4bc68b4.js" crossorigin="anonymous"></script>
</head>
<body>
	<section class="contact">
		<div class="content">
			<h2>Contact Us</h2>
			<p>We at WolfPay are committed to providing you with a reliable and efficient money transfer service. Your satisfaction is our top priority, so if you have any concerns or feedback, please don't hesitate to let us know. We are constantly striving to improve our services and enhance your experience with WolfPay.  </p>
		</div>
		<div class="container">
			<div class="contactinfo">
				<div class="box">
					<div class="icon">
						<i class="fa fa-map-marker" aria-hidden="true"></i>
					</div>
					<div class="text">
						<h3>Address</h3>
						<p>Boulevard des Martyrs. Rue K12, Villa 175. Abidjan, Deux-Plateaux.</p>
					</div>
				</div>
				<div class="box">
					<div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
					<div class="text">
						<h3>Phone</h3>
						<p>+225 0140481286</p>
					</div>
				</div>
				<div class="box">
					<div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
					<div class="text">
						<h3>Email</h3>
						<p>Wolfpay@gmail.com</p>
					</div>
				</div>
			</div>
			<div class="contactform">
  				<form action="" method="POST" autocomplete="off">
    				<h1>Send Message</h1>
    				<div class="input">
    					<div class="inputbox">
      						<input type="text" name="name" required="required">
						      <span onclick="moveLabelUp(this)">Full Name</span>
						</div>
						    <div class="inputbox">
						      	<input type="text" name="Email" required="required">
						      		<span onclick="moveLabelUp(this)">Email</span>
						    </div>
						    <div class="inputbox">
						      	<textarea required="required" onclick="moveLabelUp(this)"></textarea>
						      		<span onclick="moveLabelUp(this)">Type your Message...</span>
						    </div>
    				</div>
    					
    					<div align="center">
    						<div class="inputbox">
  <button type="submit">Send</button>
</div>

<script>
  document.querySelector("form").addEventListener("submit", function(event) {
    event.preventDefault();
    alert("Your message has been sent!");
    window.location.href = "homepage1.php";
  });
</script>

    					</div>
						    
				</form>
			</div>

					<script>
					function moveLabelUp(input) {
					  input.previousElementSibling.classList.add("label-up");
					}

					document.addEventListener("DOMContentLoaded", function() {
					  const inputBoxes = document.querySelectorAll(".inputbox input, .inputbox textarea");

					  inputBoxes.forEach(input => {
					    if (input.value.trim()) {
					      moveLabelUp(input);
					    }
					  });
					});
					</script>
		</div>
	</section>
	<script src="app.js"></script>

</body>
</html>