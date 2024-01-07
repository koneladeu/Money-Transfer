<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the current password matches the password in the database
    $user_id = $_SESSION['id'];
    $conn = mysqli_connect('localhost', 'root', '', 'moneytransfer');
    $sql = "SELECT code FROM user WHERE uid = '$user_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $password = $row['code'];

    

    if ($old_password != $password) {
        header('Location: changepassword.php?error=old_password_incorrect');
        exit();
    } else {
        // Check if the new and confirm passwords match
        if ($new_password != $confirm_password) {
            header('Location: changepassword.php?error=new_password_mismatch');
            exit();
        } else {
            // Update the password in the database
            $sql = "UPDATE user SET code = '$new_password' WHERE uid = '$user_id'";
            mysqli_query($conn, $sql);
            echo '<script>alert("Password has been updated."); window.location.href="connexion.php";</script>';
            exit();
        }
    }
}
?>
