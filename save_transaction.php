<?php
session_start();
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moneytransfer";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$receiverNumber = $_POST['receiver-number'];
$amount = $_POST['amount'];

// Get the sender's ID
$senderId = ($_SESSION['id']); // Replace with the actual sender's ID

// Check if the sender has enough balance
$sql = "SELECT balance FROM user WHERE uid = $senderId";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $senderBalance = $row['balance'];
        if ($senderBalance < $amount) {
            $_SESSION['error'] = "Insufficient balance.";
            header('Location: sendmoney.php');
            exit();
        }
    } else {
        $_SESSION['error'] = "Sender not found.";
        header('Location: sendmoney.php');
        exit();
    }
} else {
    die("Error: " . mysqli_error($conn));
}

// Get the receiver's ID
$sql = "SELECT uid FROM user WHERE phone = '$receiverNumber'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $receiverId = $row['uid'];
    } else {
        $_SESSION['error'] = "Phone Number not found. Please try again.";
        header('Location: sendmoney.php');
        exit();
    }
} else {
    die("Error: " . mysqli_error($conn));
}

// Deduct the amount from the sender's balance
$newSenderBalance = $senderBalance - $amount;
$sql = "UPDATE user SET balance = $newSenderBalance WHERE uid = $senderId";
mysqli_query($conn, $sql);


// Add the amount to the receiver's balance
$sql = "SELECT balance FROM user WHERE uid = $receiverId";
$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $receiverBalance = $row['balance'];
        $newReceiverBalance = $receiverBalance + $amount;
        $sql = "UPDATE user SET balance = $newReceiverBalance WHERE uid = $receiverId";
        mysqli_query($conn, $sql);
    } else {
        die("Error: Receiver balance not found.");
    }
} else {
    die("Error: " . mysqli_error($conn));
}

// Generate a unique transaction number
$transNumber = uniqid();

// Insert the transaction record
$sql = "INSERT INTO transaction (trans_number, sender, receiver, amount, trans_date) VALUES ('$transNumber', $senderId, $receiverId, $amount, NOW())";

if (mysqli_query($conn, $sql)) {
    $_SESSION['success'] = "Money transferred successfully.";
    header( "refresh: 3; url= homepage1.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Check if there's a success message or error message to display
if (isset($_SESSION['success'])) {
    $success_msg = $_SESSION['success'];
    // Unset the success message after 3 seconds
    echo "<script>setTimeout(function() { document.getElementById('success_msg').style.display='none'; }, 3000);</script>";
    unset($_SESSION['success']); // unset the success message
}
if (isset($_SESSION['error'])) {
    $error_msg = $_SESSION['error'];
    // Unset the error message after 3 seconds
    echo "<script>setTimeout(function() { document.getElementById('error_msg').style.display='none'; }, 3000);</script>";
    unset($_SESSION['error']); // unset the error message
}


// Close database connection
mysqli_close($conn);

?>
