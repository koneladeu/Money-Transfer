<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $confirm = $_POST['confirm'];
  if ($confirm == 'yes') {
    // User confirmed deletion, so delete the account from the database
    $user_id = $_SESSION['id'];
    $conn = mysqli_connect('localhost', 'root', '', 'moneytransfer');
    $sql = "DELETE FROM user WHERE uid = '$user_id'";
    mysqli_query($conn, $sql);

    // Destroy the session and redirect to the login page
    session_destroy();
    header('Location: connexion.php');
    exit();
  } else {
    // User canceled deletion, redirect back to the account page
    header('Location: homepage1.php');
    exit();
  }
}
?>
