<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Check if the email address exists in your database
    // If the email address does not exist, display an error message
    // If the email address exists, generate a random temporary password
    // Send an email to the user with the temporary password
    // Store the hashed temporary password in your database

    // Example code to check if the email address exists in your database
    $conn = mysqli_connect('localhost', 'root', '', 'moneytransfer');
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        //$error = urlencode('Email address not found. Please try again.');
        header("Location: forgetpassword.php?error=Email address not found. Please try again.");
        exit();
    } else {

        // Generate a random temporary password
        $temp_password = rand(1000, 9999); // Generates a random 4-digit integer

        $sql = "UPDATE user SET code = '$temp_password' WHERE email = '$email'";
        mysqli_query($conn, $sql);

        // Example code to send an email to the user with the temporary password
        // Make sure to replace the email addresses and message body with your own
        $to = $email;
        $subject = 'Temporary Password';
        $message = "Your temporary password is: $temp_password";
        $headers = 'From: christopherzoungrana@gmail.com' . "\r\n" .
            'Reply-To: christopherzoungrana@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);

        // Example code to store the hashed temporary password in your database
        // Make sure to hash the temporary password before storing it in the database


        /*$success = urlencode('A temporary password has been sent to your email address.');
        header("Location: connexion.php?success=$success");*/
        header("Location: connexion.php?error=A temporary password has been sent to your email address.");
        exit();
       
    }
}
?>
