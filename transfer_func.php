<?php
session_start();
if(isset($_SESSION['id']) && isset($_SESSION['phone'])){

    require_once "connect_db.php";
    
    $sender_id = $_SESSION['id'];
    $receiver_id = $_POST['receiver_id'];
    $amount = $_POST['amount'];

    // Check if the sender has enough balance
    $sql = "SELECT balance FROM user WHERE uid = $sender_id";
    $result = mysqli_query($conn, $sql);
    $sender_balance = mysqli_fetch_assoc($result)['balance'];

    
    if ($sender_balance >= $amount) {

        // Deduct the amount from the sender's balance
        $new_sender_balance = $sender_balance - $amount;
        $sql = "UPDATE user SET balance = $new_sender_balance WHERE uid = $sender_id";
        mysqli_query($conn, $sql);

        // Add the amount to the receiver's balance
        $sql = "SELECT balance FROM user WHERE uid = $receiver_id";
        $result = mysqli_query($conn, $sql);
        $receiver_balance = mysqli_fetch_assoc($result)['balance'];
        $new_receiver_balance = $receiver_balance + $amount;
        $sql = "UPDATE user SET balance = $new_receiver_balance WHERE uid = $receiver_id";
        mysqli_query($conn, $sql);

        // Insert the transaction record
        $sql = "INSERT INTO transaction (sender, receiver, amount) VALUES ($sender_id, $receiver_id, $amount)";
        mysqli_query($conn, $sql);

        // Redirect to the home page
        header("Location: homepage1.php");
        exit();
        
    }if (mysqli_num_rows($result) == 0) {
        //$error = urlencode('Email address not found. Please try again.');
        header("Location: sendmoney.php?error=Phone Number not found. Please try again.");
        exit();
    }  else {
        echo "Insufficient balance!";
    }
}
?>
